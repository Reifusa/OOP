<?

use core\controller\Router;
use core\model\Model;

Router::myGet('/', 'home');
Router::myGet('/getProd', 'getProd');
Router::myGet('/openOne', 'openOne');
Router::myGet('/update', 'update');
Router::myPost('/addProdu', Model::class, 'addProdu');
Router::myPost('/redact', Model::class, 'redact');
Router::myPost('/delete', Model::class, 'delete');
Router::tryAction();