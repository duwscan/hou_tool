import {configureStore} from "@reduxjs/toolkit";
import {combineReducers} from "redux";
import {persistReducer, persistStore} from "redux-persist";
import storage from "redux-persist/lib/storage";

import counterReducer from "./counter/counterSlice";
import CustomizerReducer from "./customizer/CustomizerSlice";

const persistConfig = {
    key: "root",
    storage,
};

export const store = configureStore({
    reducer: {
        counter: counterReducer,
        customizer: persistReducer<any>(persistConfig, CustomizerReducer),
    },
    devTools: false,
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware({serializableCheck: false, immutableCheck: false}),
});

const rootReducer = combineReducers({
    counter: counterReducer,
    customizer: CustomizerReducer,
});

export const persistor = persistStore(store);
export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;
export type AppState = ReturnType<typeof rootReducer>;