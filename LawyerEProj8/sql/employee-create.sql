CREATE DATABASE IF NOT EXISTS EMPLOYEE;

DROP TABLE IF EXISTS EMPLOYEE.glasses;
DROP TABLE IF EXISTS EMPLOYEE.tools;
DROP TABLE IF EXISTS EMPLOYEE.employee;
DROP TABLE IF EXISTS EMPLOYEE.department;

CREATE TABLE EMPLOYEE.department (
  department			CHAR(4) NOT NULL,
  department_name		VARCHAR(20) NOT NULL,
  dept_acct_num			INT(10) NOT NULL,
  PRIMARY KEY (department)
)
ENGINE = INNODB;

CREATE TABLE EMPLOYEE.employee (
  payroll_number		SMALLINT(5) NOT NULL,
  last_name			VARCHAR(30) NOT NULL,
  first_name			VARCHAR(20) NOT NULL,
  absences			SMALLINT(5) NULL,
  wages				DOUBLE(8, 2) NULL,
  street			VARCHAR(35) NULL,
  city				VARCHAR(20) NULL,
  state				CHAR(2) DEFAULT 'SC',
  phone				CHAR(13) NULL,
  social_security_number 	CHAR(11) NOT NULL UNIQUE,
  employment_date		DATE NULL,
  birth_date			DATE NULL,
  current_position		CHAR(20) NULL,
  fk_department			CHAR(4) NULL,
  gender			ENUM('M','F') DEFAULT 'M',
  PRIMARY KEY (payroll_number),
  FOREIGN KEY (fk_department) REFERENCES department (department)
)
ENGINE = INNODB;


CREATE TABLE EMPLOYEE.glasses (
  fk_payroll_number		SMALLINT(5) NOT NULL,
  purchase_date			DATE NOT NULL,
  optician			VARCHAR(20) NULL,
  cost				DECIMAL(6,2) NULL,
  check_number			VARCHAR(10) NULL,
  PRIMARY KEY (fk_payroll_number, purchase_date),
  FOREIGN KEY (fk_payroll_number) REFERENCES employee (payroll_number) ON DELETE CASCADE
)
ENGINE = INNODB;


CREATE TABLE EMPLOYEE.tools (
  fk_payroll_number		SMALLINT(5) NOT NULL,
  purchase_date			DATE NOT NULL,
  payroll_deduct		ENUM('Y','N'),
  tool_name			VARCHAR(15) NOT NULL,
  tool_cost			DOUBLE(5,2) NULL,
  payment_amount		DOUBLE(5,2) NULL,
  last_payment_amount		DOUBLE(5,2) NULL,
  first_payment_date		DATE NULL,
  last_payment_date		DATE NULL,
  PRIMARY KEY (fk_payroll_number, purchase_date, tool_name),
  FOREIGN KEY (fk_payroll_number) REFERENCES employee (payroll_number) ON DELETE CASCADE
)
ENGINE = INNODB;