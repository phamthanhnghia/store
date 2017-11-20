CREATE TABLE gas_x_sell
(
  id_sell int NOT NULL AUTO_INCREMENT,
  status VARCHAR(100) NOT NULL,
  id_style INT NOT NULL,
  id_agency INT NOT NULL,
  sell_date DATE NOT NULL,
  id_customer INT NOT NULL,
  phone VARCHAR(100) NOT NULL,
  note VARCHAR(100) NOT NULL,
  id_shiper INT NOT NULL,
  style_ship INT NOT NULL,
  style_discount INT NOT NULL,
  pttt_code VARCHAR(100) NOT NULL,
  money_deal INT NOT NULL,
  PRIMARY KEY (id_sell)
);

CREATE TABLE gas_x_agency
(
  id_agency int NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  phone VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_agency)
);

CREATE TABLE gas_x_customer
(
  id_customer int NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  phone VARCHAR(100) NOT NULL,
  id_agency INT NOT NULL,
  address VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_customer)
);
