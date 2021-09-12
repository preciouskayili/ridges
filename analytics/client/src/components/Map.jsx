import React, { useState } from "react";
import { VectorMap } from "@south-paw/react-vector-maps";
import Nigeria from "../data/nigeria.json";
import styled from "styled-components";

const Map = () => {
    const Map = styled.div`
      margin: 1rem auto;
      width: 50%;
    
      svg {
        stroke: #fff;
    
        // All layers are just path elements
        path {
          fill: #E8EEF2;
          cursor: pointer;
          outline: none;
    
          // When a layer is hovered
          &:hover {
            fill: rgba(232, 238, 242, 0.8);
          }
    
          // When a layer is focused.
          &:focus {
            fill: rgba(232, 238, 242, 0.6);
          }
        }
      }
    `;

  const style = { margin: "1rem auto" };

  const [hovered, setHovered] = useState("None");
  const [selected, setSelected] = React.useState([]);

  const layerProps = {
    onMouseEnter: ({ target }) => {
        setHovered(target.attributes.name.value)
        console.log(selected);
    }, 
    onMouseLeave: () => setHovered(""),
    onClick: ({ target }) => {
        const name = target.attributes.name.value;
        setSelected(name);
      }
  };
  return (
    <div style={style}>
        <div className="container-fluid">
            <div className="col-md-11 d-block mx-auto">
                <div className="card" style={{ marginTop: "-4rem" }}>
                    <div className="card-body">
                        <small className="font-weight-bold">{hovered && <span>{hovered}</span>}</small>
                        <Map>
                            <VectorMap {...Nigeria} layerProps={layerProps} />
                        </Map>
                    </div>
                </div>
            </div>
        </div>
    </div>
  );
};

export default Map;
