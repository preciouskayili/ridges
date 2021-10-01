import React from "react";
import "../assets/style.css";
import { Link } from "react-router-dom";

const Sidebar = ({ setToggled }) => {
  return (
    <aside
      className="left-sidebar"
      data-sidebarbg="skin6"
      style={{
        backgroundColor: "#153d77",
      }}
    >
      <div className="scroll-sidebar">
        <nav className="sidebar-nav">
          <ul id="sidebarnav">
            <li className="sidebar-item pt-2">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="dashboard.php"
                aria-expanded="false"
              >
                <i className="far fa-clock" aria-hidden="true"></i>
                <span className="hide-menu">Dashboard</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="profile.php"
                aria-expanded="false"
              >
                <i className="fa fa-user" aria-hidden="true"></i>
                <span className="hide-menu">Profile</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="orders.php"
                aria-expanded="false"
              >
                <i className="fas fa-cart-arrow-down"></i>
                <span className="hide-menu">Orders</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="fontawesome.html"
                aria-expanded="false"
              >
                <i className="fa fa-font" aria-hidden="true"></i>
                <span className="hide-menu">Icon</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="store.php"
                aria-expanded="false"
              >
                <i className="fas fa-industry"></i>
                <span className="hide-menu">Stores</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="blank.html"
                aria-expanded="false"
              >
                <i className="fa fa-columns" aria-hidden="true"></i>
                <span className="hide-menu">Blank Page</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="admins.php"
                aria-expanded="false"
              >
                <i className="fa fa-user-secret" aria-hidden="true"></i>
                <span className="hide-menu">Admins</span>
              </Link>
            </li>
            <li className="sidebar-item">
              <Link
                className="sidebar-link waves-effect waves-dark sidebar-link"
                to="settings.php"
                aria-expanded="false"
              >
                <i className="fas fa-cog" aria-hidden="true"></i>
                <span className="hide-menu">Settings</span>
              </Link>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  );
};

export default Sidebar;
