import React, { useState } from "react";
import { VectorMap } from "@south-paw/react-vector-maps";
import { Link } from "react-router-dom";
import Nigeria from "../data/nigeria.json";
import styled from "styled-components";
import ReactTooltip from "react-tooltip";
const Map = () => {
  const Map = styled.div`
    margin: 1rem auto;
    width: 50%;

    svg {
      stroke: #fff;

      // All layers are just path elements
      path {
        fill: #e8eef2;
        cursor: pointer;
        outline: none;

        // When a layer is hovered
        &:hover {
          fill: rgba(201, 66, 66, 0.8);
        }

        // When a layer is focused.
        &:focus {
          fill: rgba(201, 66, 66, 0.6);
        }
      }
    }
  `;

  const style = { margin: "1rem auto" };

  const [hovered, setHovered] = useState("Abuja");
  const [selected, setSelected] = useState([]);
  const [hoveredId, setHoveredId] = useState("");
  const layerProps = {
    onMouseEnter: ({ target }) => {
      setHovered(target.attributes.name.value);
      setHoveredId(target.attributes.id.value);
      console.log(selected);
    },
    onMouseLeave: () => setHovered(""),
    onClick: ({ target }) => {
      const name = target.attributes.name.value;
      const id = target.attributes.id.value;

      setHoveredId(id);
      setSelected(name);
    },
  };
  return (
    <div style={style}>
      <div className="container-fluid">
        <div className="col-md-12 d-block mx-auto">
          <div className="card" style={{ marginTop: "-4rem" }}>
            <div className="card-body">
              <Map>
                <Link to={`/details/${hoveredId}`} data-tip={`${hovered}`}>
                  <VectorMap {...Nigeria} layerProps={layerProps} />
                </Link>
                <ReactTooltip />
              </Map>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Map;
