-- establish all genre values
-- 1 - book
-- 2 - historical
-- 3 - movie
-- 4 - television
-- 5 - poem
-- 6 - play/screenplay
-- 7 - other

INSERT INTO genre (genre_name) VALUES ('book');
INSERT INTO genre (genre_name) VALUES ('historical');
INSERT INTO genre (genre_name) VALUES ('movie');
INSERT INTO genre (genre_name) VALUES ('television');
INSERT INTO genre (genre_name) VALUES ('poem');
INSERT INTO genre (genre_name) VALUES ('play/screenplay');
INSERT INTO genre (genre_name) VALUES ('other');


-- create generic user
INSERT INTO qdb_user (username, password) VALUES ('user1', 'pass');


-- add in some quotes
-- INSERT INTO quote (quote_text, author, genre_id) VALUES (,,);

-- round 1 #1-10
INSERT INTO quote (quote_text, author, genre_id) VALUES ('There is nothing like looking, if you want to find something. You certainly usually find something, if you look, but it is not always quite the something you were after.', 'J.R.R. Tolkien, The Hobbit', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('How much can you know about yourself if you''ve never been in a fight?', 'Tyler Durden', 3);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('I''m not the nicest guy in the universe, because I''m the smartest, and being nice is something stupid people do to hedge their bets.', 'Rick (Rick and Morty)', 4);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('I am the greatest. I said that even before I knew I was.', 'Muhammad Ali', 7);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Yet if mankind''s dreams are ultimately unattainable, it is better still to live on the far horizon than to grub around on shore.', 'Robert Bone', 7);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('The cowards never started and the weak died along the way.', 'Unknown', 7);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('I found that if you have a goal, that you might not reach it. But if you don''t have one, then you are never disappointed. And I gotta tell ya... it feels phenomenal.', 'Peter La Fleur', 3);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Nobody makes me bleed my own blood - nobody!', 'White Goodman', 3);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('That''s what she said.', 'Michael Scott', 4);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('There''s too many people on this earth. We need a new plague.', 'Dwight Schrute', 4);


-- round 2 #11-20

INSERT INTO quote (quote_text, author, genre_id) VALUES ('Love is poison. A sweet poison, yes, but it will kill you all the same. -Cersei Lannister', 'George R.R. Martin', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Remember, the enemy''s gate is down. -Ender', 'Orson Scott Card, Ender''s Game', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Fiction, because it is not about somebody who actually lived in the real world, always has the possibility of being about oneself.','Orson Scott Card', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Deep in the forest a call was sounding, and as often as he heard this call, mysteriously thrilling and luring, he felt compelled to turn his back upon the fire and the beaten earth around it, and to plunge into the forest, and on and on, he knew not where or why; nor did he wonder where or why, the call sounding imperiously, deep in the forest.', 'Jack London, Call of the Wild', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('I am very interested and fascinated how everyone loves each other, but no one really likes each other.','Stephen Chbosky, The Perks of Being a Wallflower', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('It''s strange because sometimes, I read a book, and I think I am the people in the book.', 'Stephen Chbosky, The Perks of Being a Wallflower', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Let us learn to show our friendship for a man when he is alive and not after he is dead.', 'F. Scott Fitzgerald, The Great Gatsby', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('All we have to decide is what to do with the time that is given us. -Gandalf', 'J.R.R. Tolkien, The Fellowship of the Ring', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('I don''t know half of you half as well as I should like; and I like less than half of you half as well as you deserve. -Bilbo Baggins', 'J.R.R. Tolkien, The Fellowship of the Ring', 1);
INSERT INTO quote (quote_text, author, genre_id) VALUES ('Imagining the future is a kind of nostalgia.', 'John Green, Looking for Alaska', 1);



