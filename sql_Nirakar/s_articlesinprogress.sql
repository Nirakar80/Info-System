ArticlesinProgress.sql
    CREATE TABLE ArticlesinProgress (
        paperID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        TitleofPaper varchar(100),
        AcademicYear varchar (11),
        ResearchType varchar(50),
        TypeofActivity varchar(100),
        PaperDescription varchar(250)
    );