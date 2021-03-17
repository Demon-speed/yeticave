INSERT INTO categories SET categ_id = "board", categ_name = "Доски и лыжи";
INSERT INTO categories SET categ_id = "fastenings", categ_name = "Крепления";
INSERT INTO categories SET categ_id = "boots", categ_name = "Ботинки";
INSERT INTO categories SET categ_id = "clothing", categ_name = "Одежда";
INSERT INTO categories SET categ_id = "tools", categ_name = "Инструменты";
INSERT INTO categories SET categ_id = "other", categ_name = "Разное";

Insert INTO users set user_id = "", user_name = "Gon", user_email = "123e@gmail.com", user_password = "imnivfvfv", user_signup_date = "20.01.2020", user_image = "wqggq", user_contact = "shsh";
Insert INTO users set user_id = "", user_name = "Kilua", user_email = "456w@gmail.com", user_password = "vffvffwynyt", user_signup_date = "20.01.2020", user_image = "gsdcvcx", user_contact = "xnj";
Insert INTO users set user_id = "", user_name = "Neferpitu", user_email = "789q@gmail.com", user_password = "ktkzru5e3w", user_signup_date = "20.01.2020", user_image = "bvnrt", user_contact = "pzjt";


INSERT INTO lots set lot_name = "2014 Rossignol District Snowboard", lot_discr= "текст номер 1", lot_image = "img/lot-1.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "10999";
INSERT INTO lots set lot_name = "DC Ply Mens 2016/2017 Snowboard", lot_discr= "текст номер 2", lot_image = "img/lot-2.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "15999";
INSERT INTO lots set lot_name = "Крепления Union Contact Pro 2015 года размер L/XL", lot_discr= "текст номер 3", lot_image = "img/lot-3.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "8000";
INSERT INTO lots set lot_name = "Ботинки для сноуборда DC Mutiny Charocal", lot_discr = "текст номер 4", lot_image = "img/lot-4.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "10999";
INSERT INTO lots set lot_name = "Куртка для сноуборда DC Mutiny Charocal", lot_discr = "текст номер 5", lot_image = "img/lot-5.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "7500";
INSERT INTO lots set lot_name = "Маска Oakley Canopy", lot_discr = "текст номер 6", lot_image = "img/lot-6.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "5400";

insert into rate set rate_id ="2", lot_id ="1", user_id ="1", rate_date ="20.03.2020", rate_price ="6000";


select * from lots where lot_cr_date > SUBDATA(now(),0);
update lots set lot_name = "new name" where lot_id = "1";
select lot_id from rate where rate_data > SUBDATA(now(),0);
