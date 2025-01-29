<?php

    require_once __DIR__.'/autoload.php';

    use app\business\get;
    use app\business\add;
    use app\business\update;
    use app\business\delete;
    use app\data\Repository;
    use app\validators\Validator;
    use app\exceptions\DataException;
    use app\exceptions\ValidatorException;

    $repository = new Repository();
    $validator = new Validator();

    try {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $body =json_decode(file_get_contents('php://input'), true);
                $add = new add($repository, $validator);
                $add->add($body);
                break;
            case 'PUT':
                $body =json_decode(file_get_contents('php://input'), true);
                $update = new Update($repository, $validator);
                $update->update($body);
                break;
            case 'GET':
                $get = new Get($repository);
                echo json_encode($get->get());
                break;
            case 'DELETE':
                $id = $_GET['id'];
                $delete = new Delete($repository);
                $delete->delete($id);
                break;
            default:
                http_response_code(405);
        }

    } catch (ValidatorException $e) {
        http_response_code(400);
        echo json_encode(['error' => $e->getMessage()]);
    } catch (DataException $e) {
        http_response_code(404);
        echo json_encode(['error' => $e->getMessage()]);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }