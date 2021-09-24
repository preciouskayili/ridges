import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav
      className="navbar navbar-expand-lg shadow-none navbar-dark"
      style={{ backgroundColor: "#153D77" }}
    >
      <div className="container-fluid">
        <Link className="navbar-brand" to="/">
          Ridges
        </Link>
        <ul className="navbar-nav d-flex flex-row ms-auto">
          {/* Icons */}
          <li className="nav-item me-4 me-lg-0">
            <Link className="nav-link" to="/home">
              <i className="fas fa-shopping-cart" />
            </Link>
          </li>
          <li className="nav-item me-4 me-lg-0">
            <Link className="nav-link" to="/home">
              <i className="fab fa-pied-piper" />
            </Link>
          </li>
          <li className="nav-item me-4 me-lg-0">
            <Link className="nav-link" to="/home">
              <i className="fab fa-twitter" />
            </Link>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Navbar;
