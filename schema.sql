create TABLE categories(
    categ_id int auto_increment,
    categ_name varchar (50),
    CONSTRAINT categ_primary PRIMARY KEY (categ_id,categ_name)
);
create UNIQUE INDEX catalog_name  on categories(categ_name);

create TABLE lots(
    lot_id int PRIMARY Key AUTO_INCREMENT,
    lot_image text,
    lot_name varchar (200),
    lot_cr_date datetime,
    lot_comp_date datetime,
    lot_step int,
    lot_start_price int,
    lot_discr text,
    lot_user_id int,
    lot_winner_id int,
    lot_categ_id int
);
CREATE INDEX categ_index on lots(lot_categ_id);
CREATE INDEX user_index on lots (lot_user_id);
CREATE INDEX winner_index oon lots(lot_winner_id);

create TABLE users(
    user_id int AUTO_INCREMENT,
    user_name varchar(100),
    user_email varchar(100),
    user_password varchar (50),
    user_signup_date date,
    user_image text,
    user_contact varchar(18),
    CONSTRAINT user_primary PRIMARY KEY (user_id,user_name,user_email)
);
create UNIQUE INDEX user_name on users(user_name);
create UNIQUE INDEX user_email on users(user_email);

create TABLE rate(
    rate_id int PRIMARY KEY  AUTO_INCREMENT,
    lot_id int,
    user_id int,
    rate_date datetime,
    rate_price int,
);
create INDEX rate_lot_index on rate(lot_id);
create INDEX rate_user_index on rate(user_id);

ALTER TABLE 'lots'
ADD CONSTRAINT lots_fk1 FOREIGN  KEY (lot_user_id) REFERENCES users(user_id);
Alter TABLE 'lots'
ADD CONSTRAINT lots_fk2 FOREIGN  key (lot_categ_id) REFERENCES categories(categ_id);
ALTER TABLE 'lots'
ADD CONSTRAINT lots_fk3 FOREIGN  key (lot_winner_id) REFERENCES categories(user_id);


ALTER TABLE 'rate'
ADD CONSTRAINT rate_fk1 FOREIGN KEY (user_id) REFERENCES user(user_id);