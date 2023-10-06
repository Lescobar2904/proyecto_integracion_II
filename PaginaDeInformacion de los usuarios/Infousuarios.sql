CREATE TABLE usuarios (
    rut VARCHAR(12) PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    email VARCHAR(100),
    telefono VARCHAR(255)
);

INSERT INTO usuarios (rut, nombre, apellido, email, telefono)
VALUES ('213456789', 'Juan', 'Sepulveda', 'juan@ejemplo.com', '94566325662'),
	   ("212394829", "Eduardo", "Hernandez", "ehernandez@ejemplo.com","9554632213"),
       ("216633221","Lukas","Escobar","LukasESC@ejemplo.com","9655221453"),
       ("215522178","Gerald","Herrera","Gerald@ejemplo.com","9655224896")
       
       
       
;