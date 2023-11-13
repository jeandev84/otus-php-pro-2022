<?php

class Tweet
{
    private $id;
    private $content;

    public function __construct(int $id, string $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}

class UnitOfWork
{
    private $connection;
    private $identityMap;
    private $data;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
        $this->identityMap = [];
        $this->data = [];
    }

    public function find(int $id): Tweet
    {
        if (isset($this->identityMap[$id])) {
            return $this->identityMap[$id];
        }

        $query = $this->connection->prepare('SELECT * FROM tweets WHERE id = ?');
        $query->execute([ $id ]);
        if (false === $data = $query->fetch()) {
            throw new \Exception(\sprintf('Tweet with id "%d" not found.', $id));
        }

        $id = (int) $data['id'];

        // Исходные данные сохраняются для того, чтобы в дальнейшем вычислить изменения.
        $this->data[$id] = $data;

        $tweet = new Tweet($id, $data['content']);
        $this->identityMap[$id] = $tweet;

        return $tweet;
    }

    public function commit(): void
    {
        // Вообще говоря, лучше вычислить все изиенения, создать один "большой" запрос
        // и выполнить его внутри транзакции, но для простоты мы сделаем для каждого
        // изменения отдельный запрос
        $query = $this->connection->prepare('UPDATE tweets SET content = ? WHERE id = ?');

        foreach ($this->identityMap as $tweet) {
            if ($tweet->getContent() !== $this->data[$tweet->getId()]['content']) {
                $query->execute([ $tweet->getContent(), $tweet->getId() ]);
            }
        }
    }
}

$connection = new \PDO('sqlite:tweets.sqlite');

$connection->exec('CREATE TABLE IF NOT EXISTS tweets (id INTEGER PRIMARY KEY, content VARCHAR(255))');

if ('--load-fixtures' === ($argv[1] ?? null)) {
    $connection->exec('DELETE FROM tweets');
    $connection->exec('INSERT INTO tweets VALUES (1, "First tweet.")');
    $connection->exec('INSERT INTO tweets VALUES (2, "Second tweet.")');
    $connection->exec('INSERT INTO tweets VALUES (3, "Third tweet.")');

    return;
}

$uof = new UnitOfWork($connection);

$tweet = $uof->find(1);
$firstTweet = $uof->find(1);

// Каждая сущность загружается только один раз благодаря IdentityMap
var_dump($tweet === $firstTweet);

$thirdTweet = $uof->find(3);
$thirdTweet->setContent('Unit of work!');

$uof->commit();