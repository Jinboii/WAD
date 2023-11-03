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



INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('1','In need of rice!', 'We need 10 bags of 5kg rice', 'Food', 'AFR-SG','afrsg_524c09215a_1698988390.jpeg', NULL);
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('2', 'Potatoes', '10 sacks of potatoes required to donate to low income families', 'Food', 'Sustainable Singapore','Artboard+31.png', NULL);
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('3','Food donation drive','Food donation drive on 4/11', 'Food', 'The Social Co.', 'download (1).png', NULL);
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('4','Looking for canned food', 'Currently accepting halal canned food', 'Food', 'Food Bank','download (2).png', NULL);
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('5', 'Help us increase our food bank!', 'Any food is welcomed', 'Food', 'Autism Association Singapore', 'download.jpeg', NULL);
INSERT INTO listings (listing_id, title, description, category, image, organization, donater) VALUES ('6', 'Donate to people in need', 'Non-perishable food only', 'Food', 'Aware', 'download.png', NULL);
