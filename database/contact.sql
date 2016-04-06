#1. Спроектировать структуру таблиц(ы) для хранения Контактов, которые могут иметь друзей из этого же списка Контактов
# (в рамках задачи достаточно хранить только Имя Контакта).
# Если Контакт 2 является другом Контакта 1, это не означает, что Контакт 1 является другом Контакта 2.
CREATE TABLE contact (
  id   INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);
CREATE TABLE friend_relation (
  id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id   INT UNSIGNED NOT NULL,
  friend_id INT UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES contact (id)
    ON DELETE CASCADE,
  FOREIGN KEY (friend_id) REFERENCES contact (id)
    ON DELETE CASCADE
);

INSERT INTO contact (name) VALUES
  ('Лена'), ('Петя'), ('Вася'),
  ('Саша'), ('Маша'), ('Дима'),
  ('Люда'), ('Инга'), ('Инга'),
  ('Лида'), ('Сережа'), ('Варя');

INSERT INTO friend_relation (user_id, friend_id) VALUES
  (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7),
  (2, 8), (2, 9), (2, 10),
  (3, 11), (3, 12), (3, 1), (3, 2),
  (4, 11), (4, 12), (4, 1), (4, 2), (4, 7), (4, 8), (4, 9),
  (5, 6), (5, 12), (5, 3), (5, 2);

# 1.1. Написать запрос sql, отображающий список Контактов, имеющих больше 5 друзей.
SELECT c.name
FROM friend_relation AS f
  INNER JOIN contact AS c ON c.id = f.user_id
GROUP BY (f.user_id)
HAVING count(f.user_id) > 5;

# 1.2. Написать запрос sql, отображающий все пары Контактов, которые дружат друг с другом. Исключить дубликаты.
SELECT
  c.name  AS user,
  c2.name AS friend
FROM friend_relation AS f
  INNER JOIN friend_relation AS f2 ON f2.user_id = f.friend_id AND f2.friend_id = f.user_id
  INNER JOIN contact AS c ON c.id = f.user_id
  INNER JOIN contact AS c2 ON c2.id = f2.user_id
WHERE c.id < c2.id;


