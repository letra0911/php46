<?php
//models/Product.php
require_once 'models/Model.php';
class Product extends Model {

    //Lấy tất cả sản phẩm đang có trên hệ thống
    public function getAll() {
        //với truy vấn mà có join bảng, thì luôn cần sử dụng
        //tên bảng trước tên trường, vd: products.price
        $sql_select_all =
            "SELECT products.*, categories.name AS category_name
            FROM products
            INNER JOIN categories 
            ON products.category_id = categories.id";
        //comment lại điều kiện WHere cho việc test,
        // tuy nhiên thực tế sẽ dùng
//            WHERE categories.status=1 AND products.status=1";
        $obj_select_all =
            $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all
            ->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}