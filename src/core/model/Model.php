<?

    namespace core\model;
    use connect\Connect;

    class Model{
        public static function addProdu(){
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];

            $sql = "INSERT INTO `poduct` values (null, '$name', '$desc', '$price', 'img.jpg')";
            $add = mysqli_query(Connect::connect(), $sql);

            if($add){
                header('Location: src/core/views/home.php');
            } else {
                die('Не удалось добавить');
            }
        }

        public static function getProd(){
            ?>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Price</td>
                    <td>Img</td>
                    <td>Actions</td>
                </tr>
                <?
                $sql = "SELECT * FROM `poduct`";
                $all = mysqli_query(Connect::connect(), $sql);
                $all = mysqli_fetch_all($all);
                foreach($all as $val){?>
                <tr>
                    <td><?= $val[0]?></td>
                    <td><?= $val[1]?></td>
                    <td><?= $val[2]?></td>
                    <td><?= $val[3]?></td>
                    <td><?= $val[4]?></td>
                    <td><a href="/openOne?id=<?=$val[0]?>">Открыть</a></td>
                    <td><a href="/update?id=<?=$val[0]?>">Редактировать</a></td>
                </tr>
                <?}?>
            </table><?
        }

        public static function openOne(){
            $id = $_GET['id'];
            $sql = "SELECT * FROM `poduct` where `id` = '$id'";
            $open = mysqli_query(Connect::connect(),$sql);
            $open = mysqli_fetch_assoc($open);

            ?>
            <h4><?=$open['id']?></h4>
            <h4><?=$open['name']?></h4>
            <h4><?=$open['desc']?></h4>
            <h4><?=$open['price']?></h4>
            <h4><?=$open['img']?></h4>
            <?
        }

        public static function update(){
            $id = $_GET['id'];
            $sql = "SELECT * FROM `poduct` where `id` = '$id'";
            $update = mysqli_query(Connect::connect(),$sql);
            $update = mysqli_fetch_assoc($update);
            ?>
            <form action="/redact" method="post">
                <input type="hidden" name="id" value="<?=$update['id']?>">
                <input type="text" name="name" value="<?=$update['name']?>">
                <input type="text" name="desc" value="<?=$update['desc']?>">
                <input type="text" name="price" value="<?=$update['price']?>">
                <input type="text" name="img" value="<?=$update['img']?>">
                <button type="submit">Редактировать</button>
            </form>
            <form action="/delete" method="post">
            <input type="hidden" name="id" value="<?= $update['id'] ?>">
            <button type="submit">Удалить</button>
        </form>
            <?
        }

        public static function redact(){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $img = $_POST['img'];

            $sql = "UPDATE `poduct` SET `id`='$id', `name`='$name', `desc`='$desc', `price`='$price', `img`='$img' where `id`='$id'";
            $redact = mysqli_query(Connect::connect(),$sql);
            if($redact){
                header('Location: src/core/views/home.php');
            } else {
                die('Не удалось редактировать информацию');
            }
        }

        public static function delete(){
            $id = $_POST['id'];
            $sql = "DELETE FROM `poduct` where `id`='$id'";
            $delete = mysqli_query(Connect::connect(),$sql);
            if($delete){
                header('Location: src/core/views/home.php');
            } else {
                die('Не удалось удалить информацию');
            }
        }


    }
