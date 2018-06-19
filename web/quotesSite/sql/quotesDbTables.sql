CREATE TABLE tag (
  tag_id  SERIAL NOT NULL PRIMARY KEY,
  tag_name  VARCHAR(100) NOT NULL
);

CREATE TABLE genre (
  genre_id SERIAL NOT NULL PRIMARY KEY,
  genre_name VARCHAR(100) NOT NULL
);

CREATE TABLE quote (
  quote_id  SERIAL NOT NULL PRIMARY KEY,
  quote_text TEXT NOT NULL,
  author  VARCHAR(80) NOT NULL,
  genre_id  INT NOT NULL REFERENCES genre(genre_id)
);

CREATE TABLE qdb_user (
  qdb_user_id  SERIAL NOT NULL PRIMARY KEY,
  username  VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL
);

CREATE TABLE list (
  list_id SERIAL NOT NULL PRIMARY KEY,
  list_name VARCHAR(100) NOT NULL,
  qdb_user_id INT NOT NULL REFERENCES qdb_user(qdb_user_id)
);


-- many-to-many junction tables

CREATE TABLE quote_tag (
  quote_id INT NOT NULL REFERENCES quote(quote_id),
  tag_id INT NOT NULL REFERENCES tag(tag_id)
);

CREATE TABLE quote_qdb_user(
  quote_id INT NOT NULL REFERENCES quote(quote_id),
  qdb_user_id INT NOT NULL REFERENCES qdb_user(qdb_user_id)
);

CREATE TABLE quote_list(
  quote_id INT NOT NULL REFERENCES quote(quote_id),
  list_id INT NOT NULL REFERENCES list(list_id)
);

