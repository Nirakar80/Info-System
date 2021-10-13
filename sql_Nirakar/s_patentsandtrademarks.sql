 CREATE TABLE PatentsandTrademarks (
        ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        PatentTitle varchar(100),
        sStatus varchar(30),
        YearSubmitted varchar(11),
        AcademicYear varchar (11),
        ResearchType varchar(50),
        sDescription varchar(250)
    );
   