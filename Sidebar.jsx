import React, { useState } from "react";
import Navbar from "./Navbar";
import { NavLink } from "react-router-dom";
import "./assets/css/sidebar.css";
import logo from "./assets/imgs/logo.png";

const SideBar = () => {
  const [isToggled, setIsToggled] = useState(false);
  return (
    <>
      <Navbar isToggled={isToggled} setIsToggled={setIsToggled} />

      <div className={isToggled ? "sidenav active shadow" : "sidenav"}>
        <div className="flex-center">
          <img src={logo} className="logo mt-3" alt="Logo" />
        </div>
        <hr className="bg-white" />
        <ul>
          <li>
            <NavLink className="link" to="/">Home</NavLink>
          </li>
          <li>
            <NavLink className="link" to="/">Examinations</NavLink>
          </li>
          <li>
            <NavLink className="link" to="/team">My Team</NavLink>
          </li>
          <li>
            <NavLink className="link" to="/profile">Profile</NavLink>
          </li>
          <li>
            <NavLink className="link" to="/create">Create quiz</NavLink>
          </li>
          <li>
            <NavLink className="link" to="/stats">My Records</NavLink>
          </li>
        </ul>
      </div>
    </>
  );
};

export default SideBar;
