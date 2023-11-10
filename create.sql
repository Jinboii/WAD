drop database if exists rebirth;

create database rebirth;
use rebirth;

CREATE TABLE IF NOT EXISTS listings (
    listing_id VARCHAR(512) NOT NULL,
    title text NOT NULL,
    description text NOT NULL,
    category text NOT NULL,    
    image varchar(255) NOT NULL,
    organization text NOT NULL,
    donater text NULL,
    PRIMARY KEY (listing_id)
);


-- Food

INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('1','In need of rice!', 'We need 10 bags of 5kg rice', 'Food', 'afrsg_524c09215a.jpeg', 'AFR-SG', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('4','Looking for canned food', 'Currently accepting halal canned food', 'Food', 'download (2).png', 'Food Bank', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('2', 'Potatoes', '10 sacks of potatoes required to donate to low income families', 'Food', 'Artboard+31.png', 'Sustainable Singapore', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('3','Food donation drive','Food donation drive on 4/11', 'Food', 'download (1).png', 'The Social Co.', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('5', 'Help us increase our food bank!', 'Any food is welcomed', 'Food', 'download.jpeg', 'Autism Association Singapore', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('6', 'Donate to people in need', 'Non-perishable food only', 'Food', 'download.png', 'Aware', '');

-- educational material
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('7', 'Looking for old textbooks', 'Primary 1 to Secondary 4 textbooks', 'Education', 'images (1).png', 'Giving SG', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('8','Educational materials donation drive', 'Accepting new stationeries or second-hand books', 'Education', 'images (2).png', 'Octava' , '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('9', 'Help us increase our book bank!', 'Storybooks/textbooks', 'Education', 'images (3).png', 'Hope Centre Singapore', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('10', 'Textbooks', 'We need some textbooks to give to low-income families', 'Education', 'images.png', 'Dementia Singapore', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('11', 'Electronic devices for students', 'Looking for second hand laptops / tablets', 'Education', 'logo512.png', 'Support GoWhere', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('12', 'Tablets', 'Second-hand tablets are welcomed', 'Education', 'mindset-og-logo.jpeg', 'Mindset', '');

-- clothing
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('13', 'Looking for children clothes', 'Donate all your old children clothes to us now!', 'Clothing', 'ORANGE-NEW-LOGO-PNG', "Children's Wishing Well", '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('14', 'Looking for cloths', 'Old rugs / cloths', 'Clothing', 'placeholder-wwf.webp', 'WWF', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('15', "Women's clothes", 'Only looking for female apparels', 'Clothing', 'ROH_LOGO-smile.png', 'Ray Of Hope', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('16', 'First aid materials', 'Looking for basic first aid materials such as bandages', 'Clothing', 'SPCA_b9c3b93e89.jpeg', 'SPCA', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('17', 'Donate to people in need', 'Looking for clothes in good conditions. Any types are welcomed!', 'Clothing', 'STREAT-logo-post.webp', 'STREAT', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('18', 'Clothes', 'For homeless people', 'Clothing', 'uxyP0BR6_400x400.jpeg', 'Clarity', '');

-- electronics
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('19', 'Looking for electronic devices', 'TV / Laptops / Tablets... all welcomed', 'Electronics', 'Logo@2x.webp', 'Salvation Army', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('20', 'Laptops only', 'Laptops in good conditions', 'Electronics', 'logo-1.png', 'Ceberal Palsy Alliance Singapore', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('21', 'Donation!', 'We need some tablets (in good conditions):-)', 'Electronics', 'ctog-logo.webp', 'City of Good', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('22', 'Kitchen appliances', 'Pls donate us some kitchen appliances such as oven or electronic whisker', 'Electronics', 'Untitled-design-6.jpg', 'The Masonic Charitable Fund', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('23', 'Laptops for low-income students', 'Hoping to receive laptops which are in fairly good condition to help facilitate learning for lower-income students', 'Electronics', '2fed95_84771edf3358430796e80849ab252a10~mv2_d_1751_1497_s_2.jpg', 'Helping Joy', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('24', 'Electronic devices', 'For people in need', 'Electronics', 'Logo_SHF.jpg', 'Singapore Heart Foundation', '');




CREATE TABLE IF NOT EXISTS archive (
    listing_id text NOT NULL,
    title text NOT NULL,
    description text NOT NULL,
    category text NOT NULL,    
    image VARCHAR(255) NOT NULL,
    organization text NOT NULL,
    donater text NULL
);
CREATE TABLE IF NOT EXISTS users(
    id int NOT NULL AUTO_INCREMENT,
    username VARCHAR(512) NOT NULL,
    email TEXT NOT NULL, 
    password TEXT NOT NULL,
    role TEXT NOT NULL,
    image TEXT null,
    about TEXT null,
    PRIMARY KEY (id,username)
);

-- INSERT INTO users (username, email, password, role, image, about) VALUES ('Salvation Army', 'abc@gmail.com', '$2y$10$kXC7pHWdlCsdZgUD0V.o6.oj65r5SPM4PXNtSbkA4biLuWsaw3f8i', 'organization'); --password: Salvationarmy
INSERT INTO users (username, email, password, role, image, about) VALUES ('Giving.sg', 'xyz@gmail.com', '$2y$10$SgTDxMKLCjrOO9hBI/KXFOBJY8p62.Qv8hC4/7OIb5xo0dAGraWFq', 'admin', 'images (1).png', "Giving.sg is an online donation and volunteer platform in Singapore that connects non-profits, volunteers, and donors to champion various social causes. It facilitates a wide range of charitable activities, allowing users to donate cash, pledge their birthdays for fundraising, and volunteer time with ease. For instance, during the COVID-19 pandemic, Giving.sg hosted multiple campaigns to support healthcare workers and vulnerable communities affected by the crisis. Their platform's ease of use encourages widespread participation in philanthropy, showcasing campaigns ranging from wildlife conservation to supporting the elderly, thus amplifying the impact of collective giving and volunteerism."); --password: Givingsg
INSERT INTO users (username, email, password, role, image, about) VALUES ('The_Food_Bank_Singapore', 'def@gmail.com', '$2y$10$CUz1e/sIPu7cUHQ0X2GTXe1/NBoVcjsG/c7y1BcT8bd78gH8iZWHq', 'admin', 'download (2).png', "Food Bank Singapore is a pivotal organization combating food insecurity and reducing food waste through strategic redistribution. They collect surplus food from various sources and provide it to organizations and communities in need. Their impactful initiatives include the 'Bank Box' program, which places donation boxes around the city for easy access to food donations. Another is the 'Joy in Every Bundle' campaign, delivering essential food packages to vulnerable families. Through collaborations with local food retailers and farms, they ensure a steady supply of nutritious food, exemplifying their commitment to nourishing the less fortunate while promoting sustainable food practices."); --password: Foodbank
INSERT INTO users (username, email, password, role, image, about) VALUES ('John', 'ghi@gmail.com', '$2y$10$UTqlS8ZyBGpAc2CP4TFBUeDuoo0gXN9a4LtqbnZSX517ac.42T6lW', 'user', '', ''); --password: John
INSERT INTO users (username, email, password, role, image, about) VALUES ('AFR-SG', 'afr@gmail.com', '$2y$10$h8OGpyxopFvSBeW.a5ZqzudjXuSd.1T.wbcqbJ1cbfy1vRmSMzNYq', 'admin', 'afrsg_524c09215a.jpeg', "Advocating for refugees in Singapore encompasses a multi-faceted approach, including NGOs like the Singapore Red Cross, offering humanitarian aid to displaced individuals globally. Initiatives like 'Refugees.sg' work to dispel misconceptions, fostering a welcoming atmosphere through education and storytelling. Community engagement programs by 'HOME: Humanitarian Organization for Migration Economics' support migrant workers, indirectly aiding refugees by promoting a culture of acceptance. Additionally, legal clinics provide pro bono services to asylum seekers, ensuring their rights are upheld. These examples embody the dedication to create a compassionate society that recognizes and acts upon the needs of refugees."); --password: Afr



CREATE TABLE IF NOT EXISTS post (
    userid text NOT NULL,
    postid text NOT NULL,
    posttitle text NOT NULL,
    postcontent text NOT NULL  
);

INSERT INTO post (userid, postid, posttitle, postcontent) VALUES ('Salvation Army', 'SalvationArmy1', 'Food Donation Drive', 'Thanks to everyone that came to down to our donation drive!');
INSERT INTO post (userid, postid, posttitle, postcontent) VALUES ('Food From the Heart', 'FoodFromTheHeart2', 'Successful donation', 'Collected a lot of food last weekend!');
INSERT INTO post (userid, postid, posttitle, postcontent) VALUES ('Food Bank', 'FoodBank3', 'Food for the low-income family', 'Took the weekend to give out the food that we collected on our donation drive to low-income families');
INSERT INTO post (userid, postid, posttitle, postcontent) VALUES ('John', 'John4', 'Happy to be a volunteer', 'Volunteered over the weekend and I really enjoyed it :)');

