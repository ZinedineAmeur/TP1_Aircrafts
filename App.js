import 'react-native-gesture-handler';
import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import {
  AdminDashboard,
  AdminDashboardMeta,
} from './src/screens/admin/dashboard/default/Dashboard';
import {
  AdminShopCustomersList,
  AdminShopCustomersListMeta,
} from './src/screens/admin/shop/customers/list/default/List';

const MainStack = createNativeStackNavigator();
const RootStack = createNativeStackNavigator();

const MainStackScreen = () => {
  return (
    <MainStack.Navigator>
      <MainStack.Screen
        name={AdminDashboardMeta.title}
        component={AdminDashboard}
      />
      <MainStack.Screen
        name={AdminShopCustomersListMeta.title}
        component={AdminShopCustomersList}
      />
    </MainStack.Navigator>
  );
};

const App = () => {
  return (
    <NavigationContainer>
      <RootStack.Navigator mode="modal">
        <RootStack.Screen
          name="Main"
          component={MainStackScreen}
          options={{ headerShown: false }}
        />
        {/* <RootStack.Screen name="" component={} /> */}
      </RootStack.Navigator>
    </NavigationContainer>
  );
};

export default App;
