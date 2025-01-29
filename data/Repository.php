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

        public function create($data) {
            if(count($this->db) == 0){
                $data['id'] = 1;
            }else{
                $data['id'] = (int)$this->db[count($this->db) - 1]['id'] + 1;
            }
            $this->db[] = $data;
            file_put_contents($this->filedata, json_encode($this->db));
        } 

        public function update($data) {
            foreach ($this->db as $key => $value) {
                if ($value['id'] == $data['id']) {
                    $this->db[$key] = $data;
                    file_put_contents($this->filedata, json_encode($this->db));
                }
            }
        }

        public function delete($id) {
            foreach ($this->db as $key => $value) {
                if ($value['id'] == $id) {
                    unset($this->db[$key]);
                    $this->db = array_values($this->db);
                    file_put_contents($this->filedata, json_encode($this->db));
                }
            }
        }
    }