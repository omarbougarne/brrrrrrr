-- Drop the database
DROP DATABASE IF EXISTS SmartTravel;
-- Create the database
CREATE DATABASE SmartTravel;
-- Use the database
USE SmartTravel;
-- Table for City
CREATE TABLE City (
    cityID INT PRIMARY KEY AUTO_INCREMENT,
    cityName VARCHAR(255)
);
-- Table for Company
CREATE TABLE Company (
    companyID INT PRIMARY KEY AUTO_INCREMENT,
    companyName VARCHAR(255),
    companyImage VARCHAR(255)
);
-- Table for Bus
CREATE TABLE Bus (
    busID INT PRIMARY KEY,
    busNumber INT,
    licensePlate VARCHAR(255),
    companyID INT,
    capacity INT,
    FOREIGN KEY (companyID) REFERENCES Company(companyID)
);
-- Table for Route
CREATE TABLE Route (
    routeID INT PRIMARY KEY AUTO_INCREMENT,
    startCityID INT,
    endCityID INT,
    distance VARCHAR(255),
    duration TIME,
    FOREIGN KEY (startCityID) REFERENCES City(cityID),
    FOREIGN KEY (endCityID) REFERENCES City(cityID),
    CHECK (startCityID != endCityID)
);
-- Table for Horaire
CREATE TABLE Schedule (
    scheduleID INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    departureTime TIME,
    arrivalTime TIME,
    availableSeats INT,
    busID INT,
    routeID INT,
    price float,
    FOREIGN KEY (busID) REFERENCES Bus(busID),
    FOREIGN KEY (routeID) REFERENCES Route(routeID)
);
INSERT INTO City (cityName)
VALUES ('Casablanca'),
    ('Fez'),
    ('Tangier'),
    ('Marrakesh'),
    ('Salé'),
    ('Meknes'),
    ('Rabat'),
    ('Oujda'),
    ('Kenitra'),
    ('Agadir'),
    ('Tetouan'),
    ('Temara'),
    ('Safi'),
    ('Mohammedia'),
    ('Khouribga'),
    ('El Jadida'),
    ('Beni Mellal'),
    ('Aït Melloul'),
    ('Nador'),
    ('Dar Bouazza'),
    ('Taza'),
    ('Settat'),
    ('Berrechid'),
    ('Khemisset'),
    ('Inezgane'),
    ('Ksar El Kebir'),
    ('Larache'),
    ('Guelmim'),
    ('Khenifra'),
    ('Berkane'),
    ('Taourirt'),
    ('Bouskoura'),
    ('Fquih Ben Salah'),
    ('Dcheira El Jihadia'),
    ('Oued Zem'),
    ('El Kelaa Des Sraghna'),
    ('Sidi Slimane'),
    ('Errachidia'),
    ('Guercif'),
    ('Oulad Teima'),
    ('Ben Guerir'),
    ('Tifelt'),
    ('Lqliaa'),
    ('Taroudant'),
    ('Sefrou'),
    ('Essaouira'),
    ('Fnideq'),
    ('Sidi Kacem'),
    ('Tiznit'),
    ('Tan-Tan'),
    ('Ouarzazate'),
    ('Souk El Arbaa'),
    ('Youssoufia'),
    ('Lahraouyine'),
    ('Martil'),
    ('Ain Harrouda'),
    ('Suq as-Sabt Awlad an-Nama'),
    ('Skhirat'),
    ('Ouazzane'),
    ('Benslimane'),
    ('Al Hoceima'),
    ('Beni Ansar'),
    ('Mdiq'),
    ('Sidi Bennour'),
    ('Midelt'),
    ('Azrou'),
    ('Drargua');
-- Insert routes between cities
INSERT INTO Route (startCityID, endCityID, distance, duration)
VALUES (3, 4, '180 km', '2:15:00'),
    -- Tangier to Marrakesh
    (4, 5, '200 km', '2:30:00'),
    -- Marrakesh to Salé
    (5, 6, '250 km', '3:15:00'),
    -- Salé to Meknes
    (6, 7, '180 km', '2:00:00'),
    -- Meknes to Rabat
    (7, 8, '200 km', '2:45:00'),
    -- Rabat to Oujda
    (8, 9, '250 km', '3:30:00'),
    -- Oujda to Kenitra
    (9, 10, '150 km', '2:00:00'),
    -- Kenitra to Agadir
    (10, 11, '120 km', '1:15:00'),
    -- Agadir to Tetouan
    (11, 12, '180 km', '2:15:00'),
    -- Tetouan to Temara
    (12, 13, '220 km', '3:00:00'),
    -- Temara to Safi
    (13, 14, '180 km', '2:15:00'),
    -- Safi to Mohammedia
    (14, 15, '200 km', '2:30:00'),
    -- Mohammedia to El Jadida
    (15, 16, '250 km', '3:15:00'),
    -- El Jadida to Beni Mellal
    (16, 17, '180 km', '2:00:00'),
    -- Beni Mellal to Aït Melloul
    (17, 18, '100 km', '1:15:00'),
    -- Marrakesh to Nador
    (18, 19, '120 km', '1:30:00'),
    -- Nador to Khemisset
    (19, 20, '300 km', '4:00:00'),
    -- Khemisset to Larache
    (20, 21, '280 km', '3:45:00'),
    -- Larache to Tan-Tan
    (21, 22, '180 km', '2:30:00'),
    -- Tan-Tan to Taza
    (22, 23, '200 km', '2:45:00'),
    -- Taza to Settat
    (23, 24, '150 km', '2:00:00'),
    -- Settat to Berrechid
    (24, 25, '220 km', '3:00:00'),
    -- Berrechid to Inezgane
    (25, 1, '180 km', '2:15:00'),
    -- Inezgane to Casablanca
    (1, 2, '250 km', '3:15:00'),
    -- Casablanca to Fez
    (2, 3, '300 km', '4:00:00'),
    -- Fez to Tangier
    (3, 4, '180 km', '2:15:00'),
    -- Tangier to Marrakesh
    (4, 5, '200 km', '2:30:00'),
    -- Marrakesh to Salé
    (5, 6, '250 km', '3:15:00'),
    -- Salé to Meknes
    (6, 7, '180 km', '2:00:00'),
    -- Meknes to Rabat
    (7, 8, '200 km', '2:45:00'),
    -- Rabat to Oujda
    (8, 9, '250 km', '3:30:00'),
    -- Oujda to Kenitra
    (9, 10, '150 km', '2:00:00'),
    -- Kenitra to Agadir
    (10, 11, '120 km', '1:15:00'),
    -- Agadir to Tetouan
    (11, 12, '180 km', '2:15:00'),
    -- Tetouan to Temara
    (12, 13, '220 km', '3:00:00'),
    -- Temara to Safi
    -- Add more routes as needed
    (13, 14, '180 km', '2:15:00'),
    -- Safi to Mohammedia
    (14, 15, '200 km', '2:30:00'),
    -- Mohammedia to El Jadida
    (15, 16, '250 km', '3:15:00'),
    -- El Jadida to Beni Mellal
    (16, 17, '180 km', '2:00:00'),
    -- Beni Mellal to Aït Melloul
    (17, 18, '100 km', '1:15:00'),
    -- Marrakesh to Nador
    (18, 19, '120 km', '1:30:00'),
    -- Nador to Khemisset
    (19, 20, '300 km', '4:00:00'),
    -- Khemisset to Larache
    (20, 21, '280 km', '3:45:00'),
    -- Larache to Tan-Tan
    (21, 22, '180 km', '2:30:00'),
    -- Tan-Tan to Taza
    -- Add more routes as needed
    (22, 23, '200 km', '2:45:00'),
    -- Taza to Settat
    (23, 24, '150 km', '2:00:00'),
    -- Settat to Berrechid
    (24, 25, '220 km', '3:00:00'),
    -- Berrechid to Inezgane
    (25, 1, '180 km', '2:15:00');
-- Inezgane to Casablanca
-- Insert companies
INSERT INTO Company (companyName, companyImage)
VALUES ('CTM', "public/imgs/ctm.jpg"),
    ('TajVoyage', "public/imgs/taj.jpg"),
    ('Bismi Allah Salama', "public/imgs/bismilah.jpg"),
    ('SAT First', "public/imgs/SAT_First.jpg"),
    ('Trans Ghazala', "public/imgs/ghazala.jpg"),
    ('Sotram', 'public/imgs/sotram.jpg'),
    ('Bab Allah', 'public/imgs/BabAllah.jpg'),
    ('GloBus Trans', 'public/imgs/GloBus.jpg'),
    ('Supratours', 'public/imgs/Supratours.jpg'),
    ('Jana Viajes', 'public/imgs/JanaViajes.jpg');
-- Insert data into the Bus table for buses of the new companies
INSERT INTO Bus (
        busID,
        busNumber,
        licensePlate,
        companyID,
        capacity
    )
VALUES -- Supratours
    (101, 101, 'AB123CD', 1, 50),
    -- SATAS
    (102, 202, 'EF456GH', 2, 45),
    -- Autocars Bardia
    (103, 303, 'IJ789KL', 3, 55),
    --  Autocars Zerktouni
    (104, 404, 'MN012OP', 4, 40),
    -- Trans Ghazala
    (105, 505, 'QR345ST', 5, 60),
    -- Alsa Maroc
    (106, 606, 'UV678WX', 6, 55),
    -- SupraTours Sahara
    (107, 707, 'YZ901AB', 7, 45),
    -- Kamel Transports
    (108, 808, 'CD234EF', 8, 50),
    -- Transavia
    (109, 909, 'GH567IJ', 9, 40),
    -- Tarik Express
    (110, 1010, 'KL890MN', 10, 60);
-- Insert schedules for Supratours (CompanyID = 1)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '09:30:00',
        '13:30:00',
        15,
        101,
        1,
        25.00
    ),
    (
        '2024-02-03',
        '09:30:00',
        '13:30:00',
        40,
        101,
        2,
        30.00
    ),
    (
        '2024-02-04',
        '12:00:00',
        '16:00:00',
        35,
        101,
        3,
        28.50
    ),
    (
        '2024-02-05',
        '14:45:00',
        '18:45:00',
        50,
        101,
        4,
        35.00
    ),
    (
        '2024-02-06',
        '17:30:00',
        '21:30:00',
        45,
        101,
        5,
        32.50
    ),
    (
        '2024-02-07',
        '20:00:00',
        '00:00:00',
        55,
        101,
        6,
        40.00
    ),
    (
        '2024-02-08',
        '22:30:00',
        '02:30:00',
        50,
        101,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '01:00:00',
        '05:00:00',
        40,
        101,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '07:30:00',
        '11:30:00',
        45,
        101,
        9,
        32.50
    ),
    (
        '2024-02-11',
        '09:30:00',
        '13:30:00',
        20,
        101,
        10,
        18.00
    );
-- schedules for SATAS (CompanyID = 2)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '10:00:00',
        '14:00:00',
        20,
        102,
        1,
        28.00
    ),
    (
        '2024-02-03',
        '10:00:00',
        '14:00:00',
        30,
        102,
        2,
        35.00
    ),
    (
        '2024-02-04',
        '12:30:00',
        '16:30:00',
        25,
        102,
        3,
        30.50
    ),
    (
        '2024-02-05',
        '15:15:00',
        '19:15:00',
        40,
        102,
        4,
        40.00
    ),
    (
        '2024-02-06',
        '18:00:00',
        '22:00:00',
        35,
        102,
        5,
        37.50
    ),
    (
        '2024-02-07',
        '20:30:00',
        '00:30:00',
        45,
        102,
        6,
        45.00
    ),
    (
        '2024-02-08',
        '22:45:00',
        '02:45:00',
        30,
        102,
        7,
        32.00
    ),
    (
        '2024-02-09',
        '01:15:00',
        '05:15:00',
        25,
        102,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '08:00:00',
        '12:00:00',
        30,
        102,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '10:00:00',
        '14:00:00',
        20,
        102,
        10,
        28.00
    );
-- Insert schedules for CTM (CompanyID = 3)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '12:00:00',
        '16:00:00',
        15,
        103,
        1,
        20.00
    ),
    (
        '2024-02-03',
        '12:00:00',
        '16:00:00',
        30,
        103,
        2,
        35.00
    ),
    (
        '2024-02-04',
        '14:30:00',
        '18:30:00',
        25,
        103,
        3,
        30.00
    ),
    (
        '2024-02-05',
        '17:15:00',
        '21:15:00',
        40,
        103,
        4,
        40.00
    ),
    (
        '2024-02-06',
        '20:00:00',
        '00:00:00',
        35,
        103,
        5,
        37.50
    ),
    (
        '2024-02-07',
        '22:30:00',
        '02:30:00',
        45,
        103,
        6,
        45.00
    ),
    (
        '2024-02-08',
        '00:45:00',
        '04:45:00',
        30,
        103,
        7,
        32.00
    ),
    (
        '2024-02-09',
        '03:15:00',
        '07:15:00',
        25,
        103,
        8,
        28.00
    ),
    (
        '2024-02-10',
        '09:30:00',
        '13:30:00',
        30,
        103,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '12:00:00',
        '16:00:00',
        15,
        103,
        10,
        20.00
    );
-- Insert schedules for Tramesa (CompanyID = 4)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '14:45:00',
        '18:45:00',
        15,
        104,
        1,
        22.00
    ),
    (
        '2024-02-03',
        '14:45:00',
        '18:45:00',
        30,
        104,
        2,
        37.00
    ),
    (
        '2024-02-04',
        '17:15:00',
        '21:15:00',
        25,
        104,
        3,
        32.50
    ),
    (
        '2024-02-05',
        '20:00:00',
        '00:00:00',
        40,
        104,
        4,
        42.00
    ),
    (
        '2024-02-06',
        '22:30:00',
        '02:30:00',
        35,
        104,
        5,
        39.00
    ),
    (
        '2024-02-07',
        '00:45:00',
        '04:45:00',
        45,
        104,
        6,
        47.50
    ),
    (
        '2024-02-08',
        '03:15:00',
        '07:15:00',
        30,
        104,
        7,
        34.00
    ),
    (
        '2024-02-09',
        '09:30:00',
        '13:30:00',
        25,
        104,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '12:00:00',
        '16:00:00',
        30,
        104,
        9,
        37.00
    ),
    (
        '2024-02-11',
        '14:45:00',
        '18:45:00',
        15,
        104,
        10,
        22.00
    );
-- Insert schedules for Trans Ghazala (CompanyID = 5)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '17:30:00',
        '21:30:00',
        15,
        105,
        1,
        25.00
    ),
    (
        '2024-02-03',
        '17:30:00',
        '21:30:00',
        30,
        105,
        2,
        40.00
    ),
    (
        '2024-02-04',
        '20:00:00',
        '00:00:00',
        25,
        105,
        3,
        35.00
    ),
    (
        '2024-02-05',
        '22:45:00',
        '02:45:00',
        40,
        105,
        4,
        45.00
    ),
    (
        '2024-02-06',
        '01:15:00',
        '05:15:00',
        35,
        105,
        5,
        42.50
    ),
    (
        '2024-02-07',
        '08:00:00',
        '12:00:00',
        45,
        105,
        6,
        50.00
    ),
    (
        '2024-02-08',
        '10:30:00',
        '14:30:00',
        30,
        105,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '12:45:00',
        '16:45:00',
        25,
        105,
        8,
        32.00
    ),
    (
        '2024-02-10',
        '15:15:00',
        '19:15:00',
        30,
        105,
        9,
        40.00
    ),
    (
        '2024-02-11',
        '17:30:00',
        '21:30:00',
        15,
        105,
        10,
        25.00
    );
-- Insert schedules for Voyages Ennajah (CompanyID = 6)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '20:00:00',
        '00:00:00',
        15,
        106,
        1,
        30.00
    ),
    (
        '2024-02-03',
        '20:00:00',
        '00:00:00',
        30,
        106,
        2,
        45.00
    ),
    (
        '2024-02-04',
        '22:30:00',
        '02:30:00',
        25,
        106,
        3,
        40.00
    ),
    (
        '2024-02-05',
        '00:45:00',
        '04:45:00',
        40,
        106,
        4,
        50.00
    ),
    (
        '2024-02-06',
        '03:15:00',
        '07:15:00',
        35,
        106,
        5,
        47.50
    ),
    (
        '2024-02-07',
        '09:30:00',
        '13:30:00',
        45,
        106,
        6,
        55.00
    ),
    (
        '2024-02-08',
        '12:00:00',
        '16:00:00',
        30,
        106,
        7,
        42.50
    ),
    (
        '2024-02-09',
        '14:15:00',
        '18:15:00',
        25,
        106,
        8,
        37.00
    ),
    (
        '2024-02-10',
        '16:45:00',
        '20:45:00',
        30,
        106,
        9,
        45.00
    ),
    (
        '2024-02-11',
        '20:00:00',
        '00:00:00',
        15,
        106,
        10,
        30.00
    );
-- Insert schedules for Rakar (CompanyID = 7)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '09:30:00',
        '13:30:00',
        15,
        107,
        1,
        25.00
    ),
    (
        '2024-02-03',
        '09:30:00',
        '13:30:00',
        30,
        107,
        2,
        40.00
    ),
    (
        '2024-02-04',
        '12:00:00',
        '16:00:00',
        25,
        107,
        3,
        35.00
    ),
    (
        '2024-02-05',
        '14:45:00',
        '18:45:00',
        40,
        107,
        4,
        45.00
    ),
    (
        '2024-02-06',
        '17:30:00',
        '21:30:00',
        35,
        107,
        5,
        42.50
    ),
    (
        '2024-02-07',
        '20:00:00',
        '00:00:00',
        45,
        107,
        6,
        50.00
    ),
    (
        '2024-02-08',
        '22:30:00',
        '02:30:00',
        30,
        107,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '01:00:00',
        '05:00:00',
        25,
        107,
        8,
        30.00
    ),
    (
        '2024-02-10',
        '07:30:00',
        '11:30:00',
        30,
        107,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '12:00:00',
        '16:00:00',
        15,
        107,
        10,
        25.00
    );
-- Insert schedules for Kamel Transports (CompanyID = 8)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '22:30:00',
        '02:30:00',
        15,
        108,
        1,
        28.00
    ),
    (
        '2024-02-03',
        '22:30:00',
        '02:30:00',
        30,
        108,
        2,
        45.00
    ),
    (
        '2024-02-04',
        '01:00:00',
        '05:00:00',
        25,
        108,
        3,
        40.00
    ),
    (
        '2024-02-05',
        '03:15:00',
        '07:15:00',
        40,
        108,
        4,
        50.00
    ),
    (
        '2024-02-06',
        '09:30:00',
        '13:30:00',
        35,
        108,
        5,
        47.50
    ),
    (
        '2024-02-07',
        '11:45:00',
        '15:45:00',
        45,
        108,
        6,
        55.00
    ),
    (
        '2024-02-08',
        '14:15:00',
        '18:15:00',
        30,
        108,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '16:30:00',
        '20:30:00',
        25,
        108,
        8,
        32.00
    ),
    (
        '2024-02-10',
        '19:00:00',
        '23:00:00',
        30,
        108,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '22:30:00',
        '02:30:00',
        15,
        108,
        10,
        28.00
    );
-- Insert schedules for Transavia (CompanyID = 9)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-05',
        '06:15:00',
        '10:15:00',
        40,
        109,
        4,
        45.00
    ),
    (
        '2024-02-06',
        '09:00:00',
        '13:00:00',
        35,
        109,
        5,
        40.00
    ),
    (
        '2024-02-07',
        '11:30:00',
        '15:30:00',
        45,
        109,
        6,
        50.00
    ),
    (
        '2024-02-08',
        '14:45:00',
        '18:45:00',
        30,
        109,
        7,
        37.50
    ),
    (
        '2024-02-09',
        '17:00:00',
        '21:00:00',
        25,
        109,
        8,
        32.00
    ),
    (
        '2024-02-10',
        '19:30:00',
        '23:30:00',
        30,
        109,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '22:00:00',
        '02:00:00',
        15,
        109,
        10,
        28.00
    );
-- Insert schedules for Tarik Express (CompanyID = 10)
INSERT INTO Schedule (
        date,
        departureTime,
        arrivalTime,
        availableSeats,
        busID,
        routeID,
        price
    )
VALUES (
        '2024-02-01',
        '07:30:00',
        '11:30:00',
        15,
        110,
        1,
        22.50
    ),
    (
        '2024-02-03',
        '07:30:00',
        '11:30:00',
        30,
        110,
        2,
        37.50
    ),
    (
        '2024-02-04',
        '10:00:00',
        '14:00:00',
        25,
        110,
        3,
        32.50
    ),
    (
        '2024-02-05',
        '12:45:00',
        '16:45:00',
        40,
        110,
        4,
        42.00
    ),
    (
        '2024-02-06',
        '15:30:00',
        '19:30:00',
        35,
        110,
        5,
        39.00
    ),
    (
        '2024-02-07',
        '18:00:00',
        '22:00:00',
        45,
        110,
        6,
        47.50
    ),
    (
        '2024-02-08',
        '20:30:00',
        '00:30:00',
        30,
        110,
        7,
        34.00
    ),
    (
        '2024-02-09',
        '23:00:00',
        '03:00:00',
        25,
        110,
        8,
        28.00
    ),
    (
        '2024-02-10',
        '01:30:00',
        '05:30:00',
        30,
        110,
        9,
        35.00
    ),
    (
        '2024-02-11',
        '04:00:00',
        '08:00:00',
        15,
        110,
        10,
        22.50
    );