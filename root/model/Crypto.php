<!-- Author: Artem Nahornyi; n01261269; -->
<?php 

class Crypto
{
    public function getCryptoById($id, $db){
        $sql = "SELECT * FROM crypto_news WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $result =  $pst->fetch(PDO::FETCH_OBJ);

        return $result;
    }
    
    public function getAllCrypto($dbcon){
        $sql = "SELECT cn.id, title, category, author, article, file
                FROM crypto_news AS cn
                JOIN crypto_news_images AS cni
                ON cn.image = cni.id ";
        $pdostm = $dbcon->prepare($sql); // prepare
        $pdostm->execute(); // execute
        $result = $pdostm->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function addCrypto($title, $category, $author, $article, $image_title, $image, $db){
        $sql = "INSERT INTO crypto_news_images (name, file) 
                VALUES (:image_title, :image)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':image_title', $image_title);
        $pst->bindParam(':image', $image);
        $result = $pst->execute();
        $imageid = $db->lastInsertId(); // to get last ID from the image

        $sql = "INSERT INTO crypto_news (title, category, author, article, image)
                VALUES (:title, :category, :author, :article, :image)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':category', $category);
        $pst->bindParam(':author', $author);
        $pst->bindParam(':article', $article);
        $pst->bindParam(':image', $imageid);
        $result = $pst->execute();

        return $result;
    }

    public function updateCrypto($id, $title, $category, $author, $article, $image_title, $db){
        $sql = "UPDATE crypto_news
                SET title = :title,
                category = :category,
                author = :author,
                article = :article,
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':category', $category);
        $pst->bindParam(':author', $author);
        $pst->bindParam(':article', $article);
        $result = $pst->execute();

        // image update-------------------------------
        // $sql = "UPDATE crypto_news_images
        //         SET file = :img
        //         WHERE product_id = :id";
        // $pst = $db->prepare($sql);
        // $pst->bindParam(':img', $img);
        // $pst->bindParam(':id', $id);
        // $result = $pst->execute();

        return $result;
    }

    public function deleteCrypto($id, $db){
        $sql = "DELETE  FROM crypto_news_images WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        $sql = "DELETE FROM crypto_news WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
} // end Crypto class