ArticlesinProceedings.sql
    CREATE TABLE ArticlesinProceedings (
        paperID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        TitleofPaper varchar(100),
        Conference varchar(50),
        Status varchar(30),
        YearAccepted varchar(11),
        AcademicYear varchar (11),
        ResearchType varchar(50),
        Scope varchar(50),
        Type varchar(30),
        Refereed varchar(11),
        Inclusion varchar(40),
        PaperDescription varchar(250)
    );