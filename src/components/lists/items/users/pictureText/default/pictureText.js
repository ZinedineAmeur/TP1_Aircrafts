import React from 'react';
import {
  StyleSheet,
  FlatList,
  Dimensions,
  Image,
  View,
  RefreshControl,
  Text,
  TouchableOpacity,
} from 'react-native';

const ListsItemsUsersPictureText = (props) => {
  
  return (
    <FlatList
      style={styles.ListsItemsUsersPictureText}
      data={props.listData}
      keyExtractor={(item) => item.uid}
      renderItem={({ item }) => (
        <View style={[styles.ListsItemsUsersPictureTextContainer]}>
          <View style={[styles.ListsItemsUsersPictureTextContainerPicture]}>
            <Image
              style={styles.ListsItemsUsersPictureTextPicture}
              source={{ uri: item.avatar }}
            />
          </View>
          <View style={[styles.ListsItemsUsersPictureTextContainerInfoMain]}>
            <Text
              style={[styles.ListsItemsUsersPictureTextContainerInfoMainName]}
            >
              {item.first_name + ' ' + item.last_name}
            </Text>
            <Text
              style={[styles.ListsItemsUsersPictureTextContainerInfoMainEmail]}
            >
              {item.email}
            </Text>
            <Text
              style={[
                styles.ListsItemsUsersPictureTextContainerInfoMainCountry,
              ]}
            >
              {item.address.country}
            </Text>
          </View>
          <View style={[styles.ListsItemsUsersPictureTextContainerInfoExtra]}>
            <Text
              style={[styles.ListsItemsUsersPictureTextContainerInfoExtraPlan]}
            >
              {item.subscription.plan}
            </Text>
          </View>
        </View>
      )}
      numColumns="1"
      refreshControl={
        <RefreshControl
          refreshing={props.refreshing}
          onRefresh={props.onRefresh}
        />
      }
    />
  );
};

const styles = StyleSheet.create({
  ListsItemsUsersPictureText: {
    padding: 10,
  },
  ListsItemsUsersPictureTextContainer: {
    flexDirection: 'row',
    flex: 1,
    justifyContent: 'space-between',
    alignItems: 'center',
    marginVertical: 10,
    borderColor: 'black',
    borderWidth: 1,
  },
  ListsItemsUsersPictureTextContainerPicture: {
    flex: 1,
    backgroundColor: 'white',
    borderColor: 'grey',
    borderRadius: 50,
    borderWidth: 2,
    justifyContent: 'center',
    alignItems: 'center',
    width: 30,
    height: 50,
  },
  ListsItemsUsersPictureTextPicture: {
    width: 40,
    height: 40,
    borderRaidus: 2,
    resizeMode: 'contain',
  },
  ListsItemsUsersPictureTextContainerInfoMain: {
    flex: 4,
    marginHorizontal: 10,
  },
  ListsItemsUsersPictureTextContainerInfoMainName: {
    fontWeight: 'bold',
  },
  ListsItemsUsersPictureTextContainerInfoMainEmail: {},
  ListsItemsUsersPictureTextContainerInfoMainCountry: {},
  ListsItemsUsersPictureTextContainerInfoExtra: {
    flex: 2,
  },
  ListsItemsUsersPictureTextContainerInfoExtraPlan: {},
});

export default ListsItemsUsersPictureText;
