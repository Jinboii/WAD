drop database if exists rebirth;

create database rebirth;
use rebirth;

CREATE TABLE IF NOT EXISTS listings (
    listing_id text NOT NULL,
    title text NOT NULL,
    description text NOT NULL,
    category text NOT NULL,    
    image text NOT NULL,
    organization text NOT NULL,
    donater text NULL
);


-- Food
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('1','In need of rice!', 'We need 10 bags of 5kg rice', 'Food', 'AFR-SG','afrsg_524c09215a_1698988390.jpeg', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('2', 'Potatoes', '10 sacks of potatoes required to donate to low income families', 'Food', 'Sustainable Singapore','Artboard+31.png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('3','Food donation drive','Food donation drive on 4/11', 'Food', 'The Social Co.', 'download (1).png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('4','Looking for canned food', 'Currently accepting halal canned food', 'Food', 'Food Bank','download (2).png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('5', 'Help us increase our food bank!', 'Any food is welcomed', 'Food', 'Autism Association Singapore', 'download.jpeg', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('6', 'Donate to people in need', 'Non-perishable food only', 'Food', 'Aware', 'download.png', '');

-- educational material
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('7', 'Looking for old textbooks', 'Primary 1 to Secondary 4 textbooks', 'Education', 'Giving SG', 'images (1).png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('8','Educational materials donation drive', 'Accepting new stationeries or second-hand books', 'Education', 'Octava' , 'images (2).png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('9', 'Help us increase our book bank!', 'Storybooks/textbooks', 'Education', 'Hope Centre Singapore', 'images (3).png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('10', 'Textbooks', 'We need some textbooks to give to low-income families', 'Education', 'Dementia Singapore', 'images.png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('11', 'Electronic devices for students', 'Looking for second hand laptops / tablets', 'Education', 'Support GoWhere', 'logo512.png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('12', 'Tablets', 'Second-hand tablets are welcomed', 'Education', 'Mindset', 'mindset-og-logo.jpeg', '');

-- clothing
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('13', 'Looking for children clothes', 'Donate all your old children clothes to us now!', 'Clothing', "Children's Wishing Well", 'ORANGE-NEW-LOGO-PNG', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('14', 'Looking for cloths', 'Old rugs / cloths', 'Clothing', 'WWF', 'placeholder-wwf.webp', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('15', "Women's clothes", 'Only looking for female apparels', 'Clothing', 'Ray Of Hope', 'ROH_LOGO-smile.png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('16', 'First aid materials', 'Looking for basic first aid materials such as bandages', 'Clothing', 'SPCA', 'SPCA_b9c3b93e89.jpeg', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('17', 'Donate to people in need', 'Looking for clothes in good conditions. Any types are welcomed!', 'Clothing', 'STREAT', 'STREAT-logo-post.webp', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('18', 'Clothes', 'For homeless people', 'Clothing', 'Clarity', 'uxyP0BR6_400x400.jpeg', '');
-- electronics
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('19', 'Looking for electronic devices', 'TV / Laptops / Tablets... all welcomed', 'Electronics', 'Salvation Army', 'Logo@2x.webp', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('20', 'Laptops only', 'Laptops in good conditions', 'Electronics', 'Ceberal Palsy Alliance Singapore', 'logo-1.png', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('21', 'Donation!', 'We need some tablets (in good conditions):-)', 'Electronics', 'City of Good', 'ctog-logo.webp', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('22', 'Kitchen appliances', 'Pls donate us some kitchen appliances such as oven or electronic whisker', 'Electronics', 'The Masonic Charitable Fund', 'Untitled-design-6.jpg', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('23', 'Laptops for low-income students', 'Hoping to receive laptops which are in fairly good condition to help facilitate learning for lower-income students', 'Helping Joy', '2fed95_84771edf3358430796e80849ab252a10~mv2_d_1751_1497_s_2.jpg', '');
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('24', 'Electronic devices', 'For people in need', 'Electronics', 'Singapore Heart Foundation', 'Logo_SHF.jpg', '');


CREATE TABLE IF NOT EXISTS archive (
    listing_id text NOT NULL,
    title text NOT NULL,
    description text NOT NULL,
    category text NOT NULL,    
    image text NOT NULL,
    organization text NOT NULL,
    donater text NULL
);

