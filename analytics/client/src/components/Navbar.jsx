import React from "react";

const Navbar = () => {
  return (
    <nav
      className="navbar navbar-expand-lg shadow-none navbar-dark"
      style={{ backgroundColor: "#153D77" }}
    >
      <div className="container-fluid">
      <a className="navbar-brand" href="/">
        Ridges
      </a>
        <ul className="navbar-nav d-flex flex-row ms-auto">
          {/* Icons */}
          <li className="nav-item me-4 me-lg-0">
            <a className="nav-link" href="/home">
              <i className="fas fa-shopping-cart" />
            </a>
          </li>
          <li className="nav-item me-4 me-lg-0">
            <a className="nav-link" href="/home">
              <i className="fab fa-pied-piper" />
            </a>
          </li>
          <li className="nav-item me-4 me-lg-0">
            <a className="nav-link" href="/home">
              <i className="fab fa-twitter" />
            </a>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Navbar;
