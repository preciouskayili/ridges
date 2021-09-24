import React from "react";
import styled from "styled-components";
import DisplayMap from "./Map";

const Home = () => {
  const Header = styled.div`
    min-height: 30vh;
    background-color: #153d77;
    color: #fff;
    padding-top: 3rem;
    padding-left: 4rem;
  `;

  return (
    <>
      <Header>
        <h3>Nigerian Map</h3>
        <p>
          Dashboard / Maps /{" "}
          <span className="font-weight-bold">Vector Maps</span>
        </p>
      </Header>
      <DisplayMap />
    </>
  );
};

export default Home;
