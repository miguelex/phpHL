<?php

    require_once __DIR__.'autoload.php';

    use app\exceptions\DataException;
    use app\exceptions\ValidatorException;

    try {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                break;
            case 'POST':
                break;
            case 'PUT':
                break;
            case 'DELETE':
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