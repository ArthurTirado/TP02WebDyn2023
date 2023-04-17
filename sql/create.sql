DROP DATABASE IF EXISTS baie_ourson;
CREATE DATABASE IF NOT EXISTS baie_ourson;

use baie_ourson;

CREATE TABLE user
(
    id               INT                 NOT NULL AUTO_INCREMENT,
    email            VARCHAR(255) UNIQUE NOT NULL,
    password         TEXT                NOT NULL,
    first_name       VARCHAR(255)        NOT NULL,
    last_name        VARCHAR(255)        NOT NULL,
    shipping_address TEXT                NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE product
(
    sku         INT            NOT NULL,
    name        VARCHAR(255)   NOT NULL,
    description TEXT           NOT NULL,
    price       DECIMAL(15, 2) NOT NULL,
    PRIMARY KEY (sku)
);

CREATE TABLE `order`
(
    id            INT      NOT NULL AUTO_INCREMENT,
    user_id       INT      NOT NULL,
    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
);

CREATE TABLE order_item
(
    id          INT NOT NULL AUTO_INCREMENT,
    order_id    INT NOT NULL,
    product_sku INT NOT NULL,
    quantity    INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE,
    FOREIGN KEY (product_sku) REFERENCES product (sku)
);

INSERT INTO product
    (sku, name, description, price)
VALUES (612458, 'T-shirt Blanc SM', '100% polyester. Facile à laver. Format Small.', 9.99),
       (154789, 'Manteau d\'hiver Ursidae', 'Manteau pour l\'hiver très chaud avec doublure.', 209.99),
       (887414, 'Bas Grizzly (x10)', 'Dix bas de laine gris. Très résistants.', 19.99);