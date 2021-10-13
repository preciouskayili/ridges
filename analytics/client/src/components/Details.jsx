import React, { useState, useEffect } from "react";
import styled from "styled-components";
import Nigeria from "../data/nigeria.json";
import { Link } from "react-router-dom";

const Header = styled.div`
  min-height: 30vh;
  background-color: #153d77;
  color: #fff;
  padding-top: 3rem;
  padding-left: 4rem;
  text-align: center;
`;
const Details = ({ match }) => {
  // TODO use result
  // eslint-disable-next-line
  const [result, setResult] = useState([]);

  const STATE_NAME = match.params.title;

  useEffect(() => {
    fetch(`http://localhost:5000/api/v1/stores/${STATE_NAME}`)
      .then((res) => res.json())
      .then((data) => {
        setResult(data);
      });
  }, [STATE_NAME]);
  return (
    <>
      <nav
        className="navbar navbar-expand-lg shadow-none navbar-dark"
        style={{ backgroundColor: "#153D77" }}
      >
        <div className="container-fluid">
          <Link className="navbar-brand" to="/">
            <i className="fa fa-arrow-left"></i>
          </Link>
        </div>
      </nav>
      <Header>
        <h3>{STATE_NAME}</h3>
      </Header>
    </>
  );
};

export default Details;
