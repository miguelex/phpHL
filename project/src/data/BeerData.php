<?php 

    namespace app\data;

    use PDO;
    use app\interfaces\DataInterface;
    use app\data\BaseData;

    class BeerData extends BaseData implements DataInterface
    {
        const TABLE = 'beer';
        public function get(): array
        {
            $query = "SELECT id, name, alcohol FROM " . self::TABLE;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }