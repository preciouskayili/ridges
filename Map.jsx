import React, { useState } from "react";
import {
  GoogleMap,
  withScriptjs,
  withGoogleMap,
  Marker,
  InfoWindow,
} from "react-google-maps";
import * as statesData from "../data/ng.json";

const Map = () => {
  const [selectedState, setSelectedState] = useState(null);
  return (
    <div className="flex-center">
      <GoogleMap
        defaultZoom={12}
        defaultCenter={{ lat: 10.081999, lng: 9.675277 }}
      >
        {statesData.states.map((state) => (
          //Marker fetches data from a lot of cities in Nigeria. Default zoom was changed to prevent clustering of markers.
          //You can also add your default icon as a prop in the Marker element.
          <Marker
            key={state.city}
            position={{ lat: Number(state.lat), lng: Number(state.lng) }}
            onClick={() => {
              setSelectedState(state);
            }}
          />
        ))}
        {selectedState && (
          <InfoWindow
            position={{
              lat: Number(selectedState.lat),
              lng: Number(selectedState.lng),
            }}
            onCloseClick={() => {
              setSelectedState(null);
            }}
          >
            <div>
              <h4>{selectedState.city}</h4>
            </div>
          </InfoWindow>
        )}
      </GoogleMap>
    </div>
  );
};

//Google Maps wrapper.
const WrappedMap = withScriptjs(withGoogleMap(Map));

const DisplayMap = () => {
  return (
    <div
      style={{
        width: "50%",
        height: "80vh",
        textAlign: "center",
        margin: "auto",
      }}
      className="text-center"
    >
      //Add your API key in the map url for accuracy
      <WrappedMap
        googleMapURL={`https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry,drawing,places`}
        loadingElement={<div style={{ height: "100%" }} />}
        containerElement={<div style={{ height: "100%" }} />}
        mapElement={<div style={{ height: "100%" }} />}
      />
    </div>
  );
};

export default DisplayMap;
