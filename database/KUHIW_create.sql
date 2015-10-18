-- tables
-- Table comments
CREATE TABLE comments (
    id int  NOT NULL ,
    restaurant_id int  NOT NULL ,
    user_id int  NOT NULL ,
    comment text  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT comments_pk PRIMARY KEY (id)
);

-- Table menu_tag
CREATE TABLE menu_tag (
    id int  NOT NULL ,
    menu_id int  NOT NULL ,
    tag_id int  NOT NULL ,
    CONSTRAINT menu_tag_pk PRIMARY KEY (id)
);

-- Table menus
CREATE TABLE menus (
    id int  NOT NULL ,
    restaurant_id int  NOT NULL ,
    name varchar(255)  NOT NULL ,
    price_min decimal(8,2)  NOT NULL ,
    price_max decimal(8,2)  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT menus_pk PRIMARY KEY (id)
);

-- Table rates
CREATE TABLE rates (
    id int  NOT NULL ,
    restaurant_id int  NOT NULL ,
    user_id int  NOT NULL ,
    rate tinyint  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT rates_pk PRIMARY KEY (id)
);

-- Table restaurant_pictures
CREATE TABLE restaurant_pictures (
    id int  NOT NULL ,
    url varchar(255)  NOT NULL ,
    restaurant_id int  NOT NULL ,
    CONSTRAINT restaurant_pictures_pk PRIMARY KEY (id)
);

-- Table restaurant_tag
CREATE TABLE restaurant_tag (
    id int  NOT NULL ,
    restaurant_id int  NOT NULL ,
    tag_id int  NOT NULL ,
    CONSTRAINT restaurant_tag_pk PRIMARY KEY (id)
);

-- Table restaurants
CREATE TABLE restaurants (
    id int  NOT NULL ,
    name varchar(255)  NOT NULL ,
    description text  NOT NULL ,
    latitude decimal(9,6)  NOT NULL ,
    longitude decimal(9,6)  NOT NULL ,
    tel varchar(16)  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT restaurants_pk PRIMARY KEY (id)
);

-- Table tags
CREATE TABLE tags (
    id int  NOT NULL ,
    name varchar(64)  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT tags_pk PRIMARY KEY (id)
);

-- Table users
CREATE TABLE users (
    id int  NOT NULL ,
    email varchar(128)  NOT NULL ,
    password varchar(128)  NOT NULL ,
    name varchar(255)  NOT NULL ,
    picture_url varchar(128)  NOT NULL ,
    created_at timestamp  NOT NULL ,
    updated_at timestamp  NOT NULL ,
    CONSTRAINT users_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  comments_restaurants (table: comments)


ALTER TABLE comments ADD CONSTRAINT comments_restaurants FOREIGN KEY comments_restaurants (restaurant_id)
    REFERENCES restaurants (id);
-- Reference:  comments_users (table: comments)


ALTER TABLE comments ADD CONSTRAINT comments_users FOREIGN KEY comments_users (user_id)
    REFERENCES users (id);
-- Reference:  menu_tag_menus (table: menu_tag)


ALTER TABLE menu_tag ADD CONSTRAINT menu_tag_menus FOREIGN KEY menu_tag_menus (menu_id)
    REFERENCES menus (id);
-- Reference:  menu_tag_tags (table: menu_tag)


ALTER TABLE menu_tag ADD CONSTRAINT menu_tag_tags FOREIGN KEY menu_tag_tags (tag_id)
    REFERENCES tags (id);
-- Reference:  menus_restaurants (table: menus)


ALTER TABLE menus ADD CONSTRAINT menus_restaurants FOREIGN KEY menus_restaurants (restaurant_id)
    REFERENCES restaurants (id);
-- Reference:  owners_restaurants (table: owners)


ALTER TABLE owners ADD CONSTRAINT owners_restaurants FOREIGN KEY owners_restaurants (restaurant_id)
    REFERENCES restaurants (id);
-- Reference:  rates_restaurants (table: rates)


ALTER TABLE rates ADD CONSTRAINT rates_restaurants FOREIGN KEY rates_restaurants (restaurant_id)
    REFERENCES restaurants (id);
-- Reference:  rates_users (table: rates)


ALTER TABLE rates ADD CONSTRAINT rates_users FOREIGN KEY rates_users (user_id)
    REFERENCES users (id);
-- Reference:  restaurant_pictures_restaurants (table: restaurant_pictures)


ALTER TABLE restaurant_pictures ADD CONSTRAINT restaurant_pictures_restaurants FOREIGN KEY restaurant_pictures_restaurants (restaurants_id)
    REFERENCES restaurants (id);
-- Reference:  restaurant_tag_restaurants (table: restaurant_tag)


ALTER TABLE restaurant_tag ADD CONSTRAINT restaurant_tag_restaurants FOREIGN KEY restaurant_tag_restaurants (restaurant_id)
    REFERENCES restaurants (id);
-- Reference:  restaurant_tag_tags (table: restaurant_tag)


ALTER TABLE restaurant_tag ADD CONSTRAINT restaurant_tag_tags FOREIGN KEY restaurant_tag_tags (tag_id)
    REFERENCES tags (id);



-- End of file.

