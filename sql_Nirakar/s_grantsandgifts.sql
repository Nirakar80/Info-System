 CREATE TABLE GrantsandGifts (
        ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        GrantorGiftTitle varchar(100),
        GrantorGiftType varchar(200),
        sStatus varchar(30),
        YearAccepted varchar(11),
        AcademicYear varchar (11),
        NeworContinuing varchar(10),
        Source varchar(20),
        ResearchType varchar(50),
        FundingAgency varchar(30),
        sRole varchar(30),
        sDescription varchar(250)
    );
   