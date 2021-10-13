import React from "react";
import Home from "./components/Home";
import Details from "./components/Details";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import NotFoundPage from "./components/NotFoundPage";
const App = () => {
  return (
    <BrowserRouter>
      <div>
        <Switch>
          <Route path="/" exact component={Home} />
          <Route path="/details/:title" exact component={Details} />
          <Route path="*" component={NotFoundPage} />
        </Switch>
      </div>
    </BrowserRouter>
  );
};

export default App;
