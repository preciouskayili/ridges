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
  const findStateById = (id) => {
    // eslint-disable-next-line
    const [key, state] = Object.entries(Nigeria.layers).find(
      ([key, state]) => state.id === match.params.id
    );

    return state;
  };

  let details = findStateById(match.params.id);

  // TODO use result
  // eslint-disable-next-line
  const [result, setResult] = useState([]);

  useEffect(() => {
    fetch(`http://localhost:5000/api/v1/stores/${details.name}`)
      .then((res) => res.json())
      .then((data) => {
        setResult(data);
      });
  }, [details])
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
        <h3>{details.name}</h3>
      </Header>
    </>
  );
};

export default Details;
