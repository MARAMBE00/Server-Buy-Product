CREATE TABLE Product(
        prodId              INT             AUTO_INCREMENT,
        prodName            VARCHAR(30)     NOT NULL,
        prodPicNameSmall    VARCHAR(100)    NOT NULL, 
        prodPicNameLarge    VARCHAR(100)    NOT NULL,
        prodDescripShort    VARCHAR(1000),
        prodDescripLong     VARCHAR(3000),
        prodPrice           DECIMAL(6,2)    NOT NULL,
        prodQuantity        INT             NOT NULL,
        CONSTRAINT          p_pid_pk        PRIMARY KEY(prodId)
);

INSERT INTO Product(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES('Samsung Smart TV', 'TvS.png', 'TvB.jpeg', 
        'Samsung UE43AU7100 (2021) HDR 4K Ultra HD Smart TV, 43 inch with TVPlus, Black', 
        'The near bezel-less screen of the AU7100 leaves you with only a beautiful 4K HDR picture. It adapts to optimise both picture and sound, 
        so you see stunning detail in every scene, just as the creators intended. Control all compatible devices with its One Remote, you can 
        access a world of online entertainment and handy home apps via Samsung\'s Smart platform, and it works with compatible Bixby, Google 
        Assistant and Alexa devices.', 
        349.00, 55);

INSERT INTO Product(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES('Apple iPad Pro 2022', 'IpadS.png', 'IpadB.jpeg', 
        '2022 Apple iPad Pro 12.9", M2 Processor, iOS, Wi-Fi, 256GB, Space Grey', 
        'The ultimate iPad just got a serious upgrade. Supercharged by Apples M2 processor, the 12.9" 2022 iPad Pro delivers astonishing 
        performance, an amazingly advanced display, and stunning speed. Fitted with a Liquid Retina XDR display, a 12MP 122° field of view front 
        camera, plus 12MP wide & 10MP ultra-wide rear cameras, your photos, videos, entertainment and games all look staggeringly good. This is a 
        Pro level iPad experience.', 
        1369.00, 80);

INSERT INTO Product(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES('Samsung Washing Machine', 'WashingMachineS.png', 'WashingMachineB.png', 
        'Samsung Series 6 WW90T684DLN Freestanding ecobubble™ AddWash™ Washing Machine, 9kg Load, 1400rpm Spin, Graphite', 
        'This Samsung AddWash™ Washing Machine has it all. Its large 9kg capacity and innovative ecobubble™ technology produces a superb washing 
        performance, while innovative features such as Super Speed, Auto Dose and Smart Control + make washing faster and easier than ever before. 
        You\'ll never look at that pile of laundry in disdain again.', 
        590.00, 23);

INSERT INTO Product(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES('Apple MacBook Pro 2023', 'LaptopS.png', 'LaptopB.png', 
        '2023 Apple MacBook Pro 16", M2 Pro Processor, 16GB RAM, 512GB SSD, Space Grey', 
        'It\'s a beast. Equipped with the blazing-fast M2 Pro chip, for work or play, Apple\'s 2023 MacBook Pro promises groundbreaking performance 
        and amazing battery life. The 120Hz ProMotion HDR display makes everything feel super fluid and responsive on-screen, while the six-speaker
        sound system fills the room with its punchy bass. All this, along with versatile connectivity options and more pixels than ever before. 
        "Pro" doesn\'t even come close to grasping how much power this notebook puts in your hands.', 
        2699.00, 41);


CREATE TABLE Users(
        userId          INT             AUTO_INCREMENT,      
        userType        VARCHAR(1)      NOT NULL,
        userFName       VARCHAR(100)    NOT NULL,
        userSName       VARCHAR(100)    NOT NULL,
        userAddress     VARCHAR(200)    NOT NULL,
        userPostCode    VARCHAR(20)     NOT NULL,
        userTelNo       VARCHAR(20)     NOT NULL,
        userEmail       VARCHAR(100)    NOT NULL UNIQUE,
        userPassword    VARCHAR(100)    NOT NULL,
        CONSTRAINT      u_uid_pk        PRIMARY KEY(userId)
);


CREATE TABLE Orders (
        orderNo         INT             AUTO_INCREMENT,
        userId          INT             NOT NULL,
        orderDateTime   DATETIME        NOT NULL,
        orderTotal      DECIMAL(8,2)    NOT NULL DEFAULT '0.00',
        orderStatus     VARCHAR(50)     DEFAULT NULL,
        shippingDate    DATE DEFAULT    NULL,
        CONSTRAINT      o_ordno_pk      PRIMARY KEY (orderNo),
        CONSTRAINT      o_uid_fk        FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) ;


CREATE TABLE Order_Line (
        oderLineId              INT             AUTO_INCREMENT,
        orderNo                 INT             NOT NULL,
        prodId                  INT             NOT NULL,
        quantityOrdered         INT             NOT NULL,
        subTotal                DECIMAL(8,2)    NOT NULL DEFAULT '0.00',
        CONSTRAINT              ol_olno_pk      PRIMARY KEY (oderLineId),
        CONSTRAINT              ol_ordno_fk     FOREIGN KEY (orderNo) REFERENCES Orders(orderNo) ON DELETE CASCADE,
        CONSTRAINT              ol_prid_fk      FOREIGN KEY (prodId) REFERENCES Product(prodId) ON DELETE CASCADE
) ;
