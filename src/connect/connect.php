<?

    namespace connect;

    class Connect{

        public static function connect(){
            $db = mysqli_connect(
                '127.0.0.1:3307',
                'root',
                '',
                'exam'
            );

            if(!$db){
                die('Не удалось подключиться к бд');
            } else {
                return $db;
            }
        }
    }