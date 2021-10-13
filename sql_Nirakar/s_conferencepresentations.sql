 CREATE TABLE ConferencePresentations (
        ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        TitleofPresentation varchar(100),
        Conference varchar(200),
        sType varchar(30),
        sStatus varchar(30),
        YearAccepted varchar(11),
        AcademicYear varchar (11),
        ResearchType varchar(50),
        Scope varchar(30),
        Refereed varchar(11),
        PresentationType varchar(30),
        sDescription varchar(250)
    );
   