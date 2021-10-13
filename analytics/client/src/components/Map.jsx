import React, { useState } from "react";
import { VectorMap } from "@south-paw/react-vector-maps";
import { Link } from "react-router-dom";
import Nigeria from "../data/nigeria.json";
import styled from "styled-components";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";

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
  const [hovered, setHovered] = useState(null);
  const [selectedState, setSelectedState] = useState("");
  const [selectedId, setSelectedId] = useState("");

  const layerProps = {
    onMouseEnter: ({ target }) => {
      setHovered(target.attributes.name.value);
    },
    onMouseLeave: () => setHovered(null),
    onClick: ({ target }) => {
      setSelectedState(target.attributes.name.value);
      setSelectedId(target.attributes.name.value);
      fetch(`http://localhost:5000/api/v1/stores/${selectedState}`)
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
        });
    },
  };

  const abbreviateNumber = (value) => {
    var newValue = value;
    if (value >= 1000) {
      var suffixes = ["", "k", "m", "b", "t"];
      var suffixNum = Math.floor(("" + value).length / 3);
      var shortValue = "";
      for (var precision = 2; precision >= 1; precision--) {
        shortValue = parseFloat(
          (suffixNum !== 0
            ? value / Math.pow(1000, suffixNum)
            : value
          ).toPrecision(precision)
        );
        var dotLessShortValue = (shortValue + "").replace(
          /[^a-zA-Z 0-9]+/g,
          ""
        );
        if (dotLessShortValue.length <= 2) {
          break;
        }
      }
      if (shortValue % 1 !== 0) shortValue = shortValue.toFixed(2);
      newValue = shortValue + suffixes[suffixNum];
    }
    return newValue;
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
                {/* <Link to="/"> */}
                <Tippy content={hovered}>
                  <MapStyle>
                    <VectorMap {...Nigeria} layerProps={layerProps} />
                  </MapStyle>
                </Tippy>
                {/* </Link> */}
              </div>

              <div
                className="col-md-5"
                style={{ display: selectedState ? "block" : "none" }}
              >
                <h3>{selectedState}</h3>
                <div className="row mt-3 mb-3">
                  <div className="col-md-4">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>100,000</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-4">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>{abbreviateNumber(100)}</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-4">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>100,000</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-4 mt-3">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>100,000</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-4 mt-3 ">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>{abbreviateNumber(144040)}</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>

                  <div className="col-md-4 mt-3 ">
                    <div className="card">
                      <div className="card-body text-center">
                        <h3>1M</h3>
                        <small className="text-muted font-weight-bold">
                          Stores
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
                <Link className="btn btn-primary" to={`/details/${selectedId}`}>
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
