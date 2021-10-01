import React, { useState } from "react";
import styled from "styled-components";
import Sidebar from "./Sidebar";
import Map from "./Map";

const Header = styled.div`
  min-height: 30vh;
  background-color: #153d77;
  color: #fff;
`;

const Content = styled.div`
  padding-top: 3rem;
  padding-left: 4rem;
`;
const Home = () => {
  const [toggled, setToggled] = useState(false);

  return (
    <>
      {toggled && <Sidebar setToggled={setToggled} />}
      <Header>
        <div className="container-fluid">
          <button
            className="d-block ms-auto btn btn-primary"
            style={{
              borderTopLeftRadius: "0px",
              borderTopRightRadius: "0px",
            }}
            onClick={() => setToggled(!toggled)}
          >
            {toggled ? (
              <>
              <i className="fas fa-times me-2"></i>
              Close
              </>
            ) : (
              <>
              <i className="fas fa-bars me-2"></i>
              Menu
              </>
            )}
          </button>
        </div>
        <Content>
          <h3>Nigerian Map</h3>
          <p>
            Dashboard / Maps /{" "}
            <span className="font-weight-bold">Vector Maps</span>
          </p>
        </Content>
      </Header>
      <div className="container-fluid" style={{ marginTop: "-1rem" }}>
        <div className="row">
          <div className="col-md-12">
            <Map />
          </div>
        </div>
      </div>
    </>
  );
};

export default Home;
