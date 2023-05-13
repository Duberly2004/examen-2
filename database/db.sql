Drop DATABASE Eval02;
CREATE DATABASE Eval02 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE Eval02;

-- TABLE PRODUCTOS
CREATE TABLE PRODUCTO (
    IdProducto INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(80) NOT NULL,
    Descripcion VARCHAR(250),
    Stock INT NOT NULL,
    PrecioVenta DECIMAL(10, 2),
    PRIMARY KEY (IdProducto)
);

INSERT INTO PRODUCTO (Nombre, Descripcion, Stock, PrecioVenta)
VALUES ('Camiseta', 'Camiseta de algodón de manga corta', 50, 19.99),
('Pantalón', 'Pantalón vaquero de corte recto', 30, 49.99),
('Zapatos', 'Zapatos de cuero para hombre', 20, 89.99),
('Bolso', 'Bolso de mano de piel sintética', 15, 39.99),
('Vestido', 'Vestido de fiesta corto', 10, 79.99),
('Reloj', 'Reloj analógico de acero inoxidable', 5, 129.99),
('Gafas de sol', 'Gafas de sol con protección UV', 25, 29.99),
('Bufanda', 'Bufanda de lana tejida', 40, 14.99),
('Billetera', 'Billetera de cuero con múltiples compartimentos', 12, 24.99),
('Sombrero', 'Sombrero de ala ancha para el verano', 8, 34.99);
