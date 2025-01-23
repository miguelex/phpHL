<?php 

    namespace app\data;

    use app\interfaces\RepositoryInterface;

    class Repository implements RepositoryInterface{
        private string $filedata;
        private array $db;

        public function __construct() {
            $this->filedata = __DIR__ . '/data.json';
            $json = file_get_contents($this->filedata);
            $this->db = json_decode($json, true);
        }

        public function get(): array {
            return $this->db;
        }

        public function exists(int $id): bool {
            foreach ($this->db as $data) {
                if ($data['id'] == $id) {
                    return true;
                }
            }

            return false;
        }
    }