        UPDATE `categories` SET `parent_id`= '0' where `parent_id` IS NULL
        UPDATE `products`   SET `category_id` = 26
