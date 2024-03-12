CREATE TABLE CONFIG (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR (50),
    password VARCHAR(255),
    totalPreguntas INT
) DEFAULT CHARSET=utf8;

CREATE TABLE TEMAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
) DEFAULT CHARSET=utf8;

CREATE TABLE PREGUNTAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tema INT, 
    pregunta TEXT,
    opcion_a TEXT,
    opcion_b TEXT,
    opcion_c TEXT,
    corrrecta VARCHAR(1),
    FOREIGN KEY (id_tema) REFERENCES TEMAS(id)
) DEFAULT CHARSET=utf8;


-- Insertar TEMAS
INSERT INTO TEMAS (nombre) VALUES ('Historia');
INSERT INTO TEMAS (nombre) VALUES ('Ciencias');
INSERT INTO TEMAS (nombre) VALUES ('Lengua');
INSERT INTO TEMAS (nombre) VALUES ('Mates');
INSERT INTO TEMAS (nombre) VALUES ('Programación');
INSERT INTO TEMAS (nombre) VALUES ('Inglés');
INSERT INTO TEMAS (nombre) VALUES ('Mitología Griega');
INSERT INTO TEMAS (nombre) VALUES ('Antigua Roma');





-- preguntas ciencias
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (14, '¿Cuál es el órgano encargado de bombear sangre en el cuerpo humano?', 'Pulmón', 'Corazón', 'Riñón', 'B'),
    (14, '¿Qué animal es conocido por cambiar de color para camuflarse?', 'Camaleón', 'León', 'Tigre', 'A'),
    (14, '¿Cuál es la unidad básica de la herencia genética?', 'Proteína', 'Átomo', 'Gen', 'C'),
    (14, '¿Cuál es el proceso de conversión de agua líquida en vapor?', 'Evaporación', 'Condensación', 'Precipitación', 'A'),
    (14, '¿Cuál es el material más duro?', 'diamante', 'roca', 'Nokia 3310', 'c');


-- historia
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (26, '¿En qué año ocurrió la Guerra Civil Española?', '1936', '1492', '1812', 'A'),
    (26, '¿Cuál es el nombre de la esposa de Fernando el Católico?', 'Isabel la Católica', 'Juana la Loca', 'María de Borgoña', 'B'),
    (26, '¿Qué evento histórico marca el final de la Edad Media en España?', 'Reconquista', 'Descubrimiento de América', 'Guerra de Sucesión', 'A'),
    (26, '¿Quién fue el dictador de España durante gran parte del siglo XX?', 'Francisco Franco', 'Miguel Primo de Rivera', 'Alfonso XIII', 'A'),
    (26, '¿En qué año se celebraron los Juegos Olímpicos en Barcelona?', '1992', '1980', '2000', 'A');



-- matematicas
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (18, '¿Cuánto es 7 x 8?', '42', '56', '64', 'B'),
    (18, '¿Cuánto es 12 dividido por 3?', '2', '4', '6', 'B'),
    (18, 'Si un triángulo tiene un ángulo recto, ¿cómo se llama?', 'Escaleno', 'Isósceles', 'Rectángulo', 'C'),
    (18, 'Si x = 2, ¿cuánto es x al cuadrado?', '2', '4', '8', 'B'),
    (18, '¿Cuánto es 15 menos 7?', '6', '7', '8', 'A');


-- mitologia griega
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (24, '¿Quién es el dios del trueno en la mitología griega?', 'Zeus', 'Apolo', 'Atenea', 'A'),
    (24, '¿Qué héroe mitológico mató al Minotauro en el laberinto?', 'Teseo', 'Perseo', 'Aquiles', 'A'),
    (24, '¿Cuál es la diosa de la sabiduría y la estrategia en la mitología griega?', 'Artemisa', 'Afrodita', 'Atenea', 'C'),
    (24, '¿Cuál es la bestia mitológica con cuerpo de león, cabeza de cabra y cola de serpiente?', 'Quimera', 'Hidra', 'Cerbero', 'A'),
    (24, '¿Quién es el héroe que mató al dragón Ladón y robó las manzanas doradas de las Hespérides?', 'Perseo', 'Heracles', 'Aquiles', 'B');



-- antigua roma
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (25, '¿Quién fue el primer emperador romano?', 'Marco Antonio', 'César Augusto', 'Nerón', 'B'),
    (25, '¿Cuál es el nombre antiguo de la ciudad de Roma?', 'Atenas', 'Constantinopla', 'Roma', 'C'),
    (25, '¿En qué famoso coliseo se celebraban los eventos públicos y gladiadores en Roma?', 'Coliseo de Roma', 'El Partenón', 'Anfiteatro Flavio', 'C'),
    (25, '¿Quién fue la reina egipcia que tuvo una relación con Julio César y Marco Antonio?', 'Cleopatra', 'Boudica', 'Agripina', 'A'),
    (25, '¿Cuál era la lengua oficial del Imperio Romano?', 'Griego', 'Latín', 'Hebreo', 'B'),


-- ingles
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (20, '¿Cómo se dice "hola" en inglés?', 'Hello', 'Goodbye', 'Thank you', 'A'),
    (20, '¿Qué significa la palabra "book" en español?', 'Libro', 'Pelota', 'Casa', 'A'),
    (20, '¿Cuál es el plural de "child"?', 'Childs', 'Childrens', 'Children', 'C'),
    (20, 'Traduce la siguiente frase: "I have a cat."', 'Tengo un gato.', 'Tengo un perro.', 'Tengo un pájaro.', 'A'),
    (20, '¿Cuál es el pasado del verbo "to do"?', 'Did', 'Done', 'Doed', 'A');


-- lengua
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (17, '¿Cuál es la función principal de un sustantivo en una oración?', 'Describir una acción', 'Identificar un lugar', 'Nombrar a una persona, animal, cosa o idea', 'C'),
    (17, '¿Cuál es la diferencia entre un sinónimo y un antónimo?', 'Un sinónimo tiene significado opuesto, y un antónimo tiene significado similar.', 'Un sinónimo tiene significado similar, y un antónimo tiene significado opuesto.', 'No hay diferencia, son lo mismo.', 'B'),
    (17, '¿Cuál es el sujeto en la oración "El perro juega en el parque."', 'El perro', 'Juega', 'El parque', 'A'),
    (17, 'Selecciona el pronombre personal en la siguiente oración: "Él fue al supermercado."', 'Él', 'Supermercado', 'Fue', 'A'),
    (17, '¿Cuál es el tiempo verbal de la oración "Yo como una manzana."', 'Presente', 'Pasado', 'Futuro', 'A'),



-- programacion
INSERT INTO preguntas (id_tema, pregunta, opcion_a, opcion_b, opcion_c, correcta)
VALUES 
    (19, '¿Qué es un bucle "for" en programación?', 'Una estructura de control que repite un bloque de código un número específico de veces.', 'Una función que calcula el factorial de un número.', 'Una condición que verifica la igualdad de dos valores.', 'A'),
    (19, 'En el contexto de programación, ¿qué es una variable?', 'Un espacio de almacenamiento con un nombre simbólico que contiene un valor o información modificable.', 'Una constante que no puede cambiar su valor durante la ejecución del programa.', 'Un operador que realiza operaciones matemáticas en dos valores.', 'A'),
    (19, '¿Qué significa el acrónimo HTML en desarrollo web?', 'HyperText Markup Language', 'High-level Text Management Language', 'Hyperlink and Text Markup Language', 'A'),
    (19, '¿Qué es un "if-else statement" en programación?', 'Una estructura de control que permite tomar decisiones basadas en condiciones.', 'Una instrucción que imprime mensajes de error en caso de fallo del programa.', 'Un tipo de bucle que se ejecuta al menos una vez.', 'A'),
    (19, '¿Cuál es la función de un operador de asignación "=" en programación?', 'Asigna un valor a una variable.', 'Compara dos valores y devuelve true si son iguales.', 'Eleva un número a una potencia específica.', 'A');
















