CREATE DATABASE crud_mahasiswa;
USE crud_mahasiswa;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL
);