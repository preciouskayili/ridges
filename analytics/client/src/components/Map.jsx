import React, { useState, useEffect } from "react";
import { VectorMap } from "@south-paw/react-vector-maps";
import { Link } from "react-router-dom";
import Nigeria from "../data/nigeria.json";
import styled from "styled-components";
import ReactTooltip from "react-tooltip";

const MapStyle = styled.div`
  svg {
    stroke: #fff;

    // All layers are just path elements
    path {
      fill: #e8eef2;
      cursor: pointer;
      outline: none;
      box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);

      // When a layer is hovered
      &:hover {
        fill: rgba(201, 66, 66, 0.8);
      }

      // When a layer is focused.
      &:focus {
        fill: rgba(201, 66, 66, 1);
      }
    }
  }
`;
const Map = () => {
  const [hovered, setHovered] = useState("None");
  const [hoveredId, setHoveredId] = useState("");
  const [selectedState, setSelectedState] = useState("");

  const layerProps = {
    onMouseEnter: ({ target }) => {
      setHovered(target.attributes.name.value);
      setHoveredId(target.attributes.id.value);
    },
    onMouseLeave: () => setHovered(""),
    onClick: ({ target }) => {
      setSelectedState(target.attributes.name.value);
      console.log(selectedState);
      fetch(`http://localhost:5000/api/v1/stores/${selectedState}`)
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
        });
    },
  };
  return (
    <>
      <div className="container-fluid">
        <div className="card">
          <div className="card-body">
            <div
              className="row"
              style={{ justifyContent: "center", alignItems: "center" }}
            >
              <div className="col-md-5">
                <Link to="/" data-tip={hovered}>
                  <MapStyle>
                    <VectorMap {...Nigeria} layerProps={layerProps} />
                  </MapStyle>
                </Link>
                <ReactTooltip />
              </div>

              <div className="col-md-5">
                <h3>{selectedState}</h3>
                <div className="row mt-3 mb-3">
                  <div className="col-md-3">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>10</h3>
                        <small className="text-muted font-weight-bold">Stores</small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-3">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>10</h3>
                        <small className="text-muted font-weight-bold">Stores</small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-3">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>10</h3>
                        <small className="text-muted font-weight-bold">Stores</small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-3">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>10</h3>
                        <small className="text-muted font-weight-bold">Stores</small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-3 mt-3 ">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>10</h3>
                        <small className="text-muted font-weight-bold">Stores</small>
                      </div>
                    </div>
                  </div>
                </div>
                <Link className="btn btn-primary" to={`/details/${hoveredId}`}>
                  View details <i className="fas fa-arrow-right"></i>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Map;
