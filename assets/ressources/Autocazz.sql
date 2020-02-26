#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `Autocazz` CHARACTER SET 'utf8';
USE `Autocazz`;
#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        id           Int  Auto_increment  NOT NULL ,
        lastName     Varchar (100) NOT NULL ,
        firstName    Varchar (100) NOT NULL ,
        password     Varchar (60) NOT NULL ,
        mail         Varchar (100) NOT NULL ,
        phoneNumber  Varchar (10) NOT NULL ,
        disabled     Bool NOT NULL ,
        displayPhone Bool NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Brands
#------------------------------------------------------------

CREATE TABLE Brands(
        id    Int  Auto_increment  NOT NULL ,
        brand Varchar (150) NOT NULL
	,CONSTRAINT Brands_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Doors
#------------------------------------------------------------

CREATE TABLE Doors(
        id     Int  Auto_increment  NOT NULL ,
        number Int NOT NULL
	,CONSTRAINT Doors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GearBox
#------------------------------------------------------------

CREATE TABLE GearBox(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (50) NOT NULL
	,CONSTRAINT GearBox_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Fuels
#------------------------------------------------------------

CREATE TABLE Fuels(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (50) NOT NULL
	,CONSTRAINT Fuels_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cars
#------------------------------------------------------------

CREATE TABLE Cars(
        id                Int  Auto_increment  NOT NULL ,
        year              Date NOT NULL ,
        firstRegistration Date NOT NULL ,
        mileage           Int NOT NULL ,
        color             Varchar (100) NOT NULL ,
        seat              Int NOT NULL ,
        firstHand         Bool NOT NULL ,
        fiscalPower       Int NOT NULL ,
        power             Int NOT NULL ,
        leasing           Bool NOT NULL ,
        sell              Bool NOT NULL ,
        smoker            Bool NOT NULL ,
        id_Brands         Int NOT NULL ,
        id_Doors          Int NOT NULL ,
        id_GearBox         Int NOT NULL ,
        id_Fuels          Int NOT NULL ,
        id_Users          Int NOT NULL
	,CONSTRAINT Cars_PK PRIMARY KEY (id)

	,CONSTRAINT Cars_Brands_FK FOREIGN KEY (id_Brands) REFERENCES Brands(id)
	,CONSTRAINT Cars_Doors_FK FOREIGN KEY (id_Doors) REFERENCES Doors(id)
	,CONSTRAINT Cars_GearBox_FK FOREIGN KEY (id_GearBox) REFERENCES GearBox(id)
	,CONSTRAINT Cars_Fuels_FK FOREIGN KEY (id_Fuels) REFERENCES Fuels(id)
	,CONSTRAINT Cars_Users0_FK FOREIGN KEY (id_Users) REFERENCES Users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Models
#------------------------------------------------------------

CREATE TABLE Models(
        id        Int  Auto_increment  NOT NULL ,
        model     Varchar (150) NOT NULL ,
        id_Brands Int NOT NULL
	,CONSTRAINT Models_PK PRIMARY KEY (id)

	,CONSTRAINT Models_Brands_FK FOREIGN KEY (id_Brands) REFERENCES Brands(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Address
#------------------------------------------------------------

CREATE TABLE Address(
        id          Int  Auto_increment  NOT NULL ,
        zipCode     Varchar (5) NOT NULL ,
        city        Varchar (100) NOT NULL ,
        address     Varchar (150) NOT NULL ,
        mainAddress Bool NOT NULL ,
        id_Users    Int NOT NULL
	,CONSTRAINT Address_PK PRIMARY KEY (id)

	,CONSTRAINT Address_Users_FK FOREIGN KEY (id_Users) REFERENCES Users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pictures
#------------------------------------------------------------

CREATE TABLE Pictures(
        id          Int  Auto_increment  NOT NULL ,
        pictureName Varchar (200) NOT NULL ,
        source      Varchar (300) NOT NULL ,
        id_Cars     Int NOT NULL
	,CONSTRAINT Pictures_PK PRIMARY KEY (id)

	,CONSTRAINT Pictures_Cars_FK FOREIGN KEY (id_Cars) REFERENCES Cars(id)
)ENGINE=InnoDB;


